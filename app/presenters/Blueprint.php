<?php

namespace App\Presenters;

use App\Components\FormControl;
use App\Models\Rme;
use App\Models\Services\Blueprints\Compiler;
use App\Models\Structs\Exercises\ScalarExercise;
use App\Presenters\Parameters;
use Nette\Forms\Controls\TextInput;
use Nette\Http\IResponse;


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

	/**
	 * @var NULL|int
	 * @persistent
	 */
	public $seed;

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

		if ($this->blueprint->removedAt) {
			$this->error('Exercise removed', IResponse::S410_GONE);
		}

		$this->checkSlug($this->blueprint);
	}

	public function renderDefault()
	{
		$exercise = $this->getExercise($this->seed);
		$this->seed = $exercise->getSeed();

		$this->template->exercise = $exercise;
		$this->template->blueprint = $exercise->getBlueprint();
		$this->template->block = $this->block;
		$this->template->schema = $this->schema;
		$this->template->suggestions = $this->getSuggestions($this->blueprint);
		$this->template->dimNextButton = !$this->userEntity->hasCompleted($this->blueprint);
		$this->template->position = $this->block ? $this->block->getPositionOf($this->blueprint) : NULL;

		$this->setFormValues($exercise);
		$this->setNextContent();
		$this->setSessionVariables();
		$this->setRecentAnswers();
	}

	/**
	 * @param NULL|int $seed
	 * @return ScalarExercise
	 */
	public function getExercise($seed = NULL)
	{
		$this->compiler->reseed($seed);
		return $this->compiler->compile($this->blueprint);
	}

	private function setFormValues($exercise)
	{
		/** @var TextInput[] $exerciseForm */
		$exerciseForm = $this['exerciseForm-form'];
		$exerciseForm['seed']->setValue($this->seed);
		$exerciseForm['answer']->setValue('');
		/** @var self|FormControl[] $this */
		$this['exerciseForm']->setArgument('exercise', $exercise);
	}

	private function setRecentAnswers()
	{
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
	}

	private function setSessionVariables()
	{
		$session = $this->session->getSection('exercise');
		$id = $this->blueprint->id;
		$key = "$id|completed";
		$this->template->justCompleted = FALSE;
		$this->payload->monsterCorrect = FALSE;
		if ($session[$key])
		{
			$this->template->justCompleted = TRUE;
			$this->payload->monsterCorrect = TRUE;
			$this->redrawControl('monsterCorrect');
		}
		$session->offsetUnset($key);

		$key = "$id|animateLast";
		$this->template->animateLast = $session[$key] ?: FALSE;
		$session->offsetUnset($key);
	}

	private function setNextContent()
	{
		list($nextContent, $nextBlock, $nextSchema) = $this->orm->contents->getNext($this->blueprint, $this->block, $this->schema);
		$this->template->nextContent = $nextContent;
		$this->template->nextBlock = $nextBlock;
		$this->template->nextSchema = $nextSchema;
	}

}
