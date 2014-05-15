<?php

namespace App\Presenters;

use App\Model\EventList;
use App\Rme\Answer;
use App\Rme\Blueprint;
use App\Rme\BlueprintCompiler;
use Nette\Application\Responses\TextResponse;
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
		$form->addHidden('time');
		$form->addHidden('inactivity');
		$form->addText('answer');

		$form->addSubmit('send');
		$form->onSuccess[] = $this->onSuccessAnswer;

		return $form;
	}

	public function onSuccessAnswer(Form $form)
	{
		$v = $form->values;
		$exercise = $this->getExercise($v->seed);

		$answer = new Answer($exercise, $v->answer);
		$answer->time = $v->time;
		$answer->inactivity = $v->inactivity === 'true';
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
	 * @param Answer[] $answers
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
