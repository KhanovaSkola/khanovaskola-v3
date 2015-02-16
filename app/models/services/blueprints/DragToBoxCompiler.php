<?php

namespace App\Models\Services\Blueprints;

use App\Models\Rme\Blueprint;
use App\Models\Rme\BlueprintPartial;
use App\Models\Structs\Exercises\DragToBoxExercise;


/**
 * Supported data keys:
 * - string $image
 * - int $imageCount
 */
class DragToBoxCompiler extends ScalarCompiler
{

	protected function createExercise(Blueprint $blueprint, $seed)
	{
		return new DragToBoxExercise($blueprint, $seed);
	}

	public function compilePartial(BlueprintPartial $partial)
	{
		/** @var DragToBoxExercise $exercise */
		$exercise = parent::compilePartial($partial);
		$exercise->setImage(
			$this->compiler->compileString($partial->data['image'], $this->vars)
		);
		$exercise->setImageCount(
			$this->compiler->compileString($partial->data['imageCount'], $this->vars)
		);

		return $exercise;
	}

}
