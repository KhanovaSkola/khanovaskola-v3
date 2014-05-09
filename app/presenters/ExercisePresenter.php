<?php

namespace App\Presenters;

use App\Model\EventList;
use App\Rme\Answer;
use App\Rme\Blueprint;
use App\Rme\BlueprintCompiler;
use Nette\Application\UI\Form;
use Nette\Forms\Controls\TextInput;


final class ExercisePresenter extends BasePresenter
{

	/**
	 * @var int
	 * @persistent
	 */
	public $blueprintId;

	/** @var Blueprint */
	protected $blueprint;

	public function startup()
	{
		parent::startup();

		if (! $this->blueprint = $this->orm->blueprints->getById($this->blueprintId))
		{
			$this->error();
		}
	}

	private function getExercise($seed = NULL)
	{
		$compiler = new BlueprintCompiler();
		if ($seed !== NULL)
		{
			$compiler->setSeed($seed);
		}

		return $compiler->compile($this->blueprint);
	}

	public function renderDefault($seed = NULL)
	{
		$exercise = $this->getExercise($seed);

		/** @var TextInput $seedInput */
		$seedInput = $this['answer-seed'];
		$seedInput->setDefaultValue($exercise->seed);

		$this->template->exercise = $exercise;
	}

	public function createComponentAnswer()
	{
		$form = new Form();

		$form->addHidden('seed');
		$form->addText('answer');

		$form->addSubmit('send');
		$form->onSuccess[] = $this->onSuccessAnswer;

		return $form;
	}

	public function onSuccessAnswer(Form $form)
	{
		$seed = $form['seed']->value;
		$input = $form['answer']->value;
		$exercise = $this->getExercise($seed);

		$answer = new Answer($exercise, $input);
		if ($exercise->verifyAnswer($input))
		{
			$this->trigger(EventList::CORRECT_ANSWER, [
				'user' => $this->userEntity,
				'exercise' => $exercise
			]);

			$answer->correct = TRUE;
			$this->flashSuccess('exercise.correct', ['answer' => $input]);
			$seed = NULL;
		}
		else
		{
			$answer->correct = FALSE;
			$this->flashError('exercise.wrong', ['answer' => $input]);
		}

		$this->getUserEntity()->answers->add($answer);
		$this->orm->flush();
		$this->redirect('this', ['seed' => $seed]);
	}

}
