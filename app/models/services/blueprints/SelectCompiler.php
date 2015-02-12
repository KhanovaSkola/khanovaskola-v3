<?php

namespace App\Models\Services\Blueprints;

use App\Models\Rme\Blueprint;
use App\Models\Rme\BlueprintPartial;
use App\Models\Structs\Exercises\SelectExercise;
use Nette\Utils\Json;


/**
 * Expecting answers[0] to be the correct answer
 */
class SelectCompiler extends ScalarCompiler
{

	protected function createExercise(Blueprint $blueprint, $seed)
	{
		return new SelectExercise($blueprint, $seed);
	}

	public function compilePartial(BlueprintPartial $partial)
	{
		/** @var SelectExercise $exercise */
		$exercise = parent::compilePartial($partial);
		$exercise->setAnswerOptions($this->compileOptions($partial, $this->vars));

		return $exercise;
	}

	protected function compileOptions(BlueprintPartial $partial, $vars)
	{
		$compiled = [];
		foreach ($partial->data['options'] as $item)
		{
			$compiled[] = $this->compiler->compileString($item, $vars);
		}
		return $compiled;
	}

}
