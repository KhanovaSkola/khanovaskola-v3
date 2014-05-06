<?php

namespace App\Rme\ExerciseBuilders;

use App\Rme\ExerciseBlueprint;
use App\Rme\ExerciseBuilder;
use Symfony\Component\Process\Process;


class SingleInput extends ExerciseBuilder
{

	/** @var array */
	private $blueprint;

	public function __construct()
	{
		$this->blueprint = $this->getBlueprint();
	}

	public function getQuestion()
	{
		return $this->compile($this->blueprint);
	}

	private function getBlueprint()
	{

	}

}
