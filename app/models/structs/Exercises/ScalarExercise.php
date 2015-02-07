<?php

namespace App\Models\Structs\Exercises;

use App\Models\Rme\Answer;
use App\Models\Rme\Blueprint;
use Nette\Object;


class ScalarExercise extends Object
{

	/**
	 * @var Blueprint
	 */
	protected $blueprint;

	/**
	 * @var int
	 */
	protected $seed;

	/**
	 * @var string
	 */
	protected $question;

	/**
	 * @var string
	 */
	protected $answer;

	/**
	 * @var string[]
	 */
	protected $hints;

	/**
	 * @param Blueprint $blueprint
	 * @param int $seed
	 */
	public function __construct(Blueprint $blueprint, $seed)
	{
		$this->blueprint = $blueprint;
		$this->seed = $seed;
	}

	public function verifyAnswer(Answer $answer)
	{
		return $answer->answer == $this->answer; // TODO check typecasting
	}

	/**
	 * @return Blueprint
	 */
	public function getBlueprint()
	{
		return $this->blueprint;
	}

	/**
	 * @return int
	 */
	public function getSeed()
	{
		return $this->seed;
	}

	/**
	 * @return string
	 */
	public function getQuestion()
	{
		return $this->question;
	}

	/**
	 * @return string
	 */
	public function getAnswer()
	{
		return $this->answer;
	}

	/**
	 * @return string[]
	 */
	public function getHints()
	{
		return $this->hints;
	}

	/**
	 * @param string $question
	 */
	public function setQuestion($question)
	{
		$this->question = $question;
	}

	/**
	 * @param string $answer
	 */
	public function setAnswer($answer)
	{
		$this->answer = $answer;
	}

	/**
	 * @param \string[] $hints
	 */
	public function setHints($hints)
	{
		$this->hints = $hints;
	}

	/**
	 * @return string
	 * Foo\SelectExercise => select
	 */
	public function getTemplateName()
	{
		$parts = explode('\\', (static::class));
		$last = $parts[count($parts) - 1];
		return lcFirst(substr($last, 0, -strlen('Exercise')));
	}

}
