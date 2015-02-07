<?php

namespace App\Models\Structs\Exercises;


class SelectExercise extends ScalarExercise
{

	/**
	 * @var string[]
	 */
	protected $answerOptions;

	public function setAnswerOptions(array $options)
	{
		shuffle($options);
		$this->answerOptions = $options;
	}

	/**
	 * @return string[]
	 */
	public function getAnswerOptions()
	{
		return $this->answerOptions;
	}

}
