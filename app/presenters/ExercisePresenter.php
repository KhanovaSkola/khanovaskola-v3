<?php

namespace App\Presenters;

use App\Rme\Blueprint;
use App\Rme\BlueprintCompiler;
use Nette\Application\UI\Form;


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
		$this['answer-seed']->setDefaultValue($exercise->seed);
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
		$answer = $form['answer']->value;

		$exercise = $this->getExercise($seed);
		if ($exercise->verifyAnswer($answer))
		{
			$this->flashSuccess('exercise.correct', ['answer' => $answer]);
			$this->redirect('this', ['seed' => NULL]);
		}
		else
		{
			$this->flashError('exercise.wrong', ['answer' => $answer]);
			$this->redirect('this', ['seed' => $seed]);
		}
	}

}
