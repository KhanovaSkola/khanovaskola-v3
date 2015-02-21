<?php

namespace App\Components\Forms;

use App\Models\Rme;
use App\Models\Structs\EventList;
use App\Presenters\Blueprint;
use Nette\Utils\Strings;


class Exercise extends Form
{

	public function setup()
	{
		$this->addHidden('seed');
		$this->addHidden('time');
		$this->addHidden('inactivity');
		$this->addHidden('hint');
		$this->addText('answer');

		$this->addSubmit('send', 'verify')
			->getControlPrototype()->addAttributes(['class' => 'btn bnt-primary']);

		return $this;
	}

	public function onSuccess()
	{
		/** @var Blueprint $presenter */
		$presenter = $this->presenter;

		$v = $this->values;
		$exercise = $presenter->getExercise($v->seed);

		if (!Strings::trim($v->answer))
		{
			$presenter->redirect('this', ['seed' => $v->seed]);
		}

		$answer = new Rme\Answer($exercise, $v->answer);
		$answer->time = $v->time ?: 0;
		$answer->inactivity = $v->inactivity === 'true'; // js
		$answer->hint = $v->hint === 'true'; // js
		$presenter->getUserEntity()->answers->add($answer);

		if ($presenter->seed)
		{
			/** @var NULL|Rme\Answer $last */
			$last = $presenter->userEntity->answers->get()
				->findBy(['content' => $exercise->getBlueprint()->id])
				->orderBy('createdAt', 'DESC')->applyLimit(1, 1)->fetch(); // ignore this answer
			if ($last && $last->seed === (int) $presenter->seed)
			{
				$answer->firstTry = FALSE;
			}
		}

		if ($exercise->verifyAnswer($answer))
		{
			$presenter->trigger(EventList::CORRECT_ANSWER, [
				'user' => $presenter->userEntity,
				'exercise' => $exercise
			]);

			$answer->correct = TRUE;
			$presenter->seed = NULL;
		}
		else
		{
			$answer->correct = FALSE;
			$presenter->seed = $v->seed;
		}
		$presenter->payload->correct = $answer->correct;

		$presenter->orm->flush();

		$session = $presenter->session->getSection('exercise');
		$id = $presenter->blueprint->id;
		$session["$id|animateLast"] = !$answer->correct || $answer->firstTry;

		if (!$presenter->userEntity->hasCompleted($presenter->blueprint))
		{
			$minAnswers = 5;

			/** @var Rme\Answer[] $answers */
			$answers = $this->blueprint->getRecentAnswersBy($presenter->userEntity)->applyLimit($minAnswers);
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
					$completion->schema = $presenter->schema;
					$completion->block = $presenter->block;
					$completion->content = $presenter->blueprint;
					$completion->user = $presenter->userEntity;
					$this->orm->completedContents->attach($completion);
					$this->orm->flush();

					$id = $presenter->blueprint->id;
					$session["$id|completed"] = TRUE;
				}
			}
		}

		if ($presenter->isAjax())
		{
			$presenter->redrawControl('goalBox');
			$presenter->redrawControl('question');
			return;
		}

		$presenter->redirect('this', [
			'slug' => $presenter->blueprint->slug,
		]);
	}

}
