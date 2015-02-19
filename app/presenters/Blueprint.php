<?php

namespace App\Presenters;

use App\Models\Rme;
use App\Models\Services\Blueprints\Compiler;
use App\Models\Structs\EventList;
use App\Presenters\Parameters;
use Nette\Application\UI\Form;
use Nette\Forms\Controls\TextInput;


final class Blueprint extends Content
{

	use Parameters\Block;
	use Parameters\Blueprint;
	use Parameters\Schema;
	use Parameters\Slug;

	/**
	 * @var Compiler
	 * @inject
	 */
	public $compiler;

	public function startup()
	{
		parent::startup();
		$this->loadBlueprint();
		$this->loadBlock(function() {
			$block = $this->blueprint->getRandomParent();
			if ($block)
			{
				$this->redirectToEntity($this->blueprint, $block);
			}
		});
		$this->loadSchema(function() {
			if (!$this->block)
			{
				return NULL;
			}

			$schema = $this->block->getRandomParent();
			if ($schema)
			{
				$this->redirectToEntity($this->blueprint, $this->block, $schema);
			}
		});

		if ($this->block && !$this->block->contains($this->blueprint))
		{
			$this->redirectToEntity($this->blueprint);
		}
		if ($this->block && $this->schema && !$this->schema->contains($this->block))
		{
			$this->redirectToEntity($this->blueprint);
		}

		$this->checkSlug($this->blueprint);
	}

	private function getExercise($seed = NULL)
	{
		if ($seed !== NULL)
		{
			$this->compiler->setSeed($seed);
		}

		return $this->compiler->compile($this->blueprint);
	}

	public function renderDefault($seed = NULL)
	{
		$exercise = $this->getExercise($seed);

		/** @var TextInput $seedInput */
		$seedInput = $this['answer-seed'];
		$seedInput->setDefaultValue($exercise->getSeed());

		$this->template->exercise = $exercise;
		$this->template->blueprint = $exercise->getBlueprint();
		$this->template->block = $this->block;
		$this->template->schema = $this->schema;
		$this->template->suggestions = $this->getSuggestions($this->blueprint);

		list($nextContent, $nextBlock, $nextSchema) = $this->orm->contents->getNext($this->blueprint, $this->block, $this->schema);
		$this->template->nextContent = $nextContent;
		$this->template->nextBlock = $nextBlock;
		$this->template->nextSchema = $nextSchema;

		$session = $this->session->getSection('exercise');
		$id = $this->blueprint->id;
		$key = "$id|completed";
		$this->template->justCompleted = $session[$key] ?: FALSE;
		$session->offsetUnset($key);

		$key = "$id|animateLast";
		$this->template->animateLast = $session[$key] ?: FALSE;
		$session->offsetUnset($key);

		$this->template->dimNextButton = !$this->userEntity->hasCompleted($this->blueprint);

		/** @var Rme\Answer[] $answers */
		$answers = $this->blueprint->getRecentAnswersBy($this->userEntity)->applyLimit(7);
		$recentAnswers = [];
		foreach ($answers as $answer)
		{
			$recentAnswers[] = $answer->correct
				? ($answer->hint ? 'answer-hint' : 'answer-correct')
				: 'answer-wrong';
		}
		$recentAnswers = array_reverse($recentAnswers);
		for ($i = count($recentAnswers); $i < 5; $i++)
		{
			$recentAnswers[] = 'filler';
		}
		for ($i = count($recentAnswers); $i < 7; $i++)
		{
			array_unshift($recentAnswers, 'filler');
		}
		$this->template->recentAnswers = $recentAnswers;

		$this->template->position = $this->block ? $this->block->getPositionOf($this->blueprint) : NULL;
	}

	public function createComponentAnswer()
	{
		$form = new Form();

		$form->addHidden('seed');
		$form->addHidden('time');
		$form->addHidden('inactivity');
		$form->addHidden('hint');
		$form->addText('answer');

		$form->addSubmit('send', 'Zkontrolovat')
			->getControlPrototype()->addAttributes(['class' => 'btn bnt-primary']);
		$form->onSuccess[] = $this->onSuccessAnswer;

		return $form;
	}

	public function onSuccessAnswer(Form $form)
	{
		$v = $form->values;
		$exercise = $this->getExercise($v->seed);

		$answer = new Rme\Answer($exercise, $v->answer);
		$answer->time = $v->time;
		$answer->inactivity = $v->inactivity === 'true'; // js
		$answer->hint = $v->hint === 'true'; // js
		$this->getUserEntity()->answers->add($answer);

		if ($seed = $this->getParameter('seed'))
		{
			/** @var NULL|Rme\Answer $last */
			$last = $this->userEntity->answers->get()->orderBy('createdAt', 'DESC')->fetch();
			if ($last && $last->seed === (int) $seed)
			{
				$answer->firstTry = FALSE;
			}
		}

		if ($exercise->verifyAnswer($answer))
		{
			$this->trigger(EventList::CORRECT_ANSWER, [
				'user' => $this->userEntity,
				'exercise' => $exercise
			]);

			$answer->correct = TRUE;
			$seed = NULL;
		}
		else
		{
			$answer->correct = FALSE;
			$seed = $v->seed;
		}

		$this->orm->flush();

		$session = $this->session->getSection('exercise');
		$id = $this->blueprint->id;
		$session["$id|animateLast"] = !$answer->correct || $answer->firstTry;

		if (!$this->userEntity->hasCompleted($this->blueprint))
		{
			$minAnswers = 5;

			/** @var Rme\Answer[] $answers */
			$answers = $this->blueprint->getRecentAnswersBy($this->userEntity)->applyLimit($minAnswers);
			if (count($answers) === $minAnswers)
			{
				$completed = TRUE;
				foreach ($answers as $answer)
				{
					if (!$answer->correct || $answer->hint)
					{
						$completed = FALSE;
						break;
					}
				}
				if ($completed)
				{
					$completion = new Rme\CompletedContent();
					$completion->schema = $this->schema;
					$completion->block = $this->block;
					$completion->content = $this->blueprint;
					$completion->user = $this->userEntity;
					$this->orm->completedContents->attach($completion);
					$this->orm->flush();

					$id = $this->blueprint->id;
					$session["$id|completed"] = TRUE;
				}
			}
		}

		$this->redirect('this', [
			'seed' => $seed,
			'slug' => $this->blueprint->slug,
		]);
	}

	public function renderAnswerChartData()
	{
		$answers = $this->blueprint->getRecentAnswersBy($this->userEntity)
			->where('inactivity = false')->applyLimit(30);
		$answers = array_reverse($answers->fetchAll());

		$data = [];
		foreach ($answers as $i => $answer)
		{
			$score = $this->computeScore(array_slice($answers, 0, $i + 1));
			$data[] = [$i + 1, $answer->time / 1e3, $answer->correct, $score];
		}
		$this->sendJson($data);
	}

	/**
	 * @param Rme\Answer[] $answers
	 * @return float 0..1
	 */
	private function computeScore(array $answers)
	{
		$minRequired = 20;
		$score = 0;
		foreach ($answers as $answer)
		{
			if ($answer->correct)
			{
				$score += 1/$minRequired;
			}
			else
			{
				$score = max($score - 1/8, 0);
			}
		}
		// TODO work with $answer->time

		return $score;
	}

}
