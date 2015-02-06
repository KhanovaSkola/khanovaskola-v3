<?php

namespace App\Models\Rme;

use App\Models\Orm\Entity;


/**
 * @property string       $question
 * @property string       $answer
 * @property array        $hints
 *
 * @property Blueprint    $blueprint {m:1 contents $partials}
 */
class BlueprintPartial extends Entity
{

	public function addHint($hint)
	{
		$hints = $this->hints;
		$hints[] = $hint;
		$this->setValue('hints', $hints);
	}

}
