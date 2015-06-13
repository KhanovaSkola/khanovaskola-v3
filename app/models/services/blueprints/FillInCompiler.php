<?php

namespace App\Models\Services\Blueprints;

use App\Models\Rme\Blueprint;
use App\Models\Structs\Exercises\FillInExercise;


/**
 * Supported data keys:
 */
class FillInCompiler extends ScalarCompiler
{

	protected function createExercise(Blueprint $blueprint, $seed)
	{
		return new FillInExercise($blueprint, $seed);
	}


}
