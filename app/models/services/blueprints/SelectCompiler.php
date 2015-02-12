<?php

namespace App\Models\Services\Blueprints;

use App\Models\Rme\Blueprint;
use App\Models\Rme\BlueprintPartial;
use App\Models\Structs\Exercises\SelectExercise;


/**
 * Supported data keys:
 * - string[] $options evaluated items to render in radio
 * - bool $shuffle
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
		$exercise->setShuffle(isset($partial->data['shuffle']) ? $partial->data['shuffle'] : TRUE);
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
