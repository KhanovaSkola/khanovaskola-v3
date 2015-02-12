<?php

namespace App\Models\Structs\Exercises;


class SelectExercise extends ScalarExercise
{

	/**
	 * @var string[]
	 */
	protected $answerOptions;

	/**
	 * @var bool
	 */
	protected $shuffle = TRUE;

	public function setAnswerOptions(array $options)
	{
		if ($this->shuffle)
		{
			shuffle($options);
		}
		$this->answerOptions = $options;
	}

	/**
	 * @return string[]
	 */
	public function getAnswerOptions()
	{
		return $this->answerOptions;
	}

	public function setShuffle($shuffle = TRUE)
	{
		$this->shuffle = $shuffle;
	}

	public function getShuffle()
	{
		return $this->shuffle;
	}

}
