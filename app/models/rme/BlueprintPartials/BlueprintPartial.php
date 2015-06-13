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
	const ANSWER_DRAG_TO_BOX = 'dragToBox';
	const ANSWER_FILL_IN = 'fillIn';

	public static function getAnswerTypes()
	{
		return [
			self::ANSWER_SCALAR => self::ANSWER_SCALAR,
			self::ANSWER_SELECT => self::ANSWER_SELECT,
			self::ANSWER_DRAG_TO_BOX => self::ANSWER_DRAG_TO_BOX,
			self::ANSWER_FILL_IN => self::ANSWER_FILL_IN,
		];
	}

	public function addHint($hint)
	{
		$hints = $this->hints;
		$hints[] = $hint;
		$this->setValue('hints', $hints);
	}

}
