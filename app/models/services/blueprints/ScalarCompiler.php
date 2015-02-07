<?php

namespace App\Models\Services\Blueprints;

use App\Models\Rme\Blueprint;
use App\Models\Rme\BlueprintPartial;
use App\Models\Structs\Exercises\ScalarExercise;


class ScalarCompiler
{

	/**
	 * @var Compiler
	 */
	protected $compiler;

	/**
	 * @var array
	 */
	protected $vars;

	public function __construct(Compiler $compiler, array $vars)
	{
		$this->compiler = $compiler;
		$this->vars = $vars;
	}

	/**
	 * @param BlueprintPartial $partial
	 * @return ScalarExercise
	 */
	public function compilePartial(BlueprintPartial $partial)
	{
		$exercise = $this->createExercise($partial->blueprint, $this->compiler->getSeed());

		$exercise->setQuestion($this->compileQuestion($partial->question, $this->vars));
		$exercise->setAnswer($this->compileAnswer($partial->answer, $this->vars));
		$exercise->setHints($this->compileHints($partial->hints, $this->vars));

		return $exercise;
	}

	protected function createExercise(Blueprint $blueprint, $seed)
	{
		return new ScalarExercise($blueprint, $seed);
	}

	protected function compileQuestion($question, $vars)
	{
		return $this->compiler->compileString($question, $vars);
	}

	protected function compileAnswer($answer, $vars)
	{
		return $this->compiler->compileString($answer, $vars);
	}

	protected function compileHints(array $hints, $vars)
	{
		$compiled = [];
		foreach ($hints as $i => $hint)
		{
			$compiled[$i] = $this->compiler->compileString($hint, $vars);
		}
		return $compiled;
	}

}
