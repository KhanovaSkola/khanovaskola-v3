<?php

namespace App\Presenters;

use App\Models\Rme;
use App\Models\Services\BlueprintCompiler;
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
	 * @var BlueprintCompiler
	 * @inject
	 */
	public $blueprintCompiler;

	public function startup()
	{
		parent::startup();
		$this->loadBlueprint();
		$this->loadBlock(function() {
			$block = $this->blueprint->getRandomParent();
			if ($block)
			{
				$this->redirectToEntity($this->blueprint, $block, $block->getRandomParent());
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
			$this->error();
		}
		if ($this->block && $this->schema && !$this->schema->contains($this->block))
		{
			$this->error();
		}

		$this->checkSlug($this->blueprint);
	}

	private function getExercise($seed = NULL)
	{
		if ($seed !== NULL)
		{
			$this->blueprintCompiler->setSeed($seed);
		}

		return $this->blueprintCompiler->compile($this->blueprint);
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

		$form->addSubmit('send');
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
		if ($exercise->verifyAnswer($answer))
		{
			$this->trigger(EventList::CORRECT_ANSWER, [
				'user' => $this->userEntity,
				'exercise' => $exercise
			]);

			$answer->correct = TRUE;
			$this->flashSuccess('exercise.correct', ['answer' => $v->answer]);
			$seed = NULL;
		}
		else
		{
			$answer->correct = FALSE;
			$this->flashError('exercise.wrong', ['answer' => $v->answer]);
			$seed = $v->seed;
		}

		$this->getUserEntity()->answers->add($answer);
		$this->orm->flush();
		$this->redirect('this', ['seed' => $seed]);
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
