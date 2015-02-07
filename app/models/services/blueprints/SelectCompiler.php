<?php

namespace App\Models\Services\Blueprints;

use App\Models\Rme\Blueprint;
use App\Models\Rme\BlueprintPartial;
use App\Models\Structs\Exercises\ScalarExercise;
use App\Models\Structs\Exercises\SelectExercise;
use Nette\Utils\Json;


/**
 * Expecting answers[0] to be the correct answer
 */
class SelectCompiler extends ScalarCompiler
{

	/**
	 * @var array
	 */
	private $precompiledAnswers;

	protected function createExercise(Blueprint $blueprint, $seed)
	{
		return new SelectExercise($blueprint, $seed);
	}

	public function compilePartial(BlueprintPartial $partial)
	{
		$this->precompiledAnswers = $this->precompileAnswer($partial->answer, $this->vars);

		/** @var SelectExercise $exercise */
		$exercise = parent::compilePartial($partial);
		$exercise->setAnswerOptions($this->precompiledAnswers);

		return $exercise;
	}

	protected function compileAnswer($answer, $vars)
	{
		return $this->precompiledAnswers[0];
	}

	protected function precompileAnswer($answer, $vars)
	{
		$compiled = [];
		foreach (Json::decode($answer, Json::FORCE_ARRAY) as $item)
		{
			$compiled[] = $this->compiler->compileString($item, $vars);
		}
		return $compiled;
	}

}
