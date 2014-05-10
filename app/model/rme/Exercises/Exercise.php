<?php

namespace App\Rme;

use Nette\Object;


class Exercise extends Object
{

	/** @var Blueprint */
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
	 * @param Blueprint $blueprint
	 * @param int $seed
	 * @param string $question
	 * @param string $answer
	 * @param string[] $hints
	 */
	public function __construct(Blueprint $blueprint, $seed, $question, $answer, array $hints)
	{
		$this->blueprint = $blueprint;
		$this->seed = $seed;
		$this->question = $question;
		$this->answer = $answer;
		$this->hints = $hints;
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

}
