<?php

namespace App\Rme;

use Nette\Object;


class Exercise extends Object
{

	/** @var ExerciseBlueprint */
	private $blueprint;

	/** @var int */
	private $seed;

	/** @var string */
	private $question;

	/** @var string */
	private $answer;

	/** @var string[] */
	private $hints;

	/**
	 * @param ExerciseBlueprint $blueprint
	 * @param int $seed
	 * @param string $question
	 * @param string $answer
	 * @param string[] $hints
	 */
	public function __construct(ExerciseBlueprint $blueprint, $seed, $question, $answer, array $hints)
	{
		$this->blueprint = $blueprint;
		$this->seed = $seed;
		$this->question = $question;
		$this->answer = $answer;
		$this->hints = $hints;
	}

}
