<?php

namespace App\Models\Structs\Exercises;

use App\Models\Rme\Answer;
use Nette\Utils\Json;


class FillInExercise extends ScalarExercise
{

	public function verifyAnswer(Answer $answer)
	{
		$values = Json::decode($this->answer);

		foreach (Json::decode($answer->answer) as $box => $value)
		{
			if ($value != $values[$box])
			{
				return FALSE;
			}
		}

		return TRUE;
	}

}
