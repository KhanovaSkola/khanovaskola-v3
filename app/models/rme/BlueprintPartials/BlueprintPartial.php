<?php

namespace App\Models\Rme;

use App\Models\Orm\Entity;


/**
 * @property string       $question
 * @property string       $answerType {enum self::getAnswerTypes()}
 * @property string       $answer
 * @property array        $hints
 * @property mixed        $data
 *
 * @property Blueprint    $blueprint  {m:1 contents $partials}
 */
class BlueprintPartial extends Entity
{

	const ANSWER_SCALAR = 'scalar';
	const ANSWER_SELECT = 'select';

	public static function getAnswerTypes()
	{
		return [
			self::ANSWER_SCALAR => self::ANSWER_SCALAR,
			self::ANSWER_SELECT => self::ANSWER_SELECT,
		];
	}

	public function addHint($hint)
	{
		$hints = $this->hints;
		$hints[] = $hint;
		$this->setValue('hints', $hints);
	}

}
