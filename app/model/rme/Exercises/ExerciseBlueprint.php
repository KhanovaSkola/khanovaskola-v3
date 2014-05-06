<?php

namespace App\Rme;

use App\InvalidArgumentException;
use App\NotImplementedException;
use Nette\Object;


class ExerciseBlueprint extends Object
{

	const TYPE_INT = 'integer';
	const TYPE_LIST = 'list';
	const TYPE_PLURAL = 'plural';

	/** @var array */
	private $vars;

	/** @var string */
	private $question;

	/** @var string */
	private $answer;

	/** @var string[] */
	private $hints;

	/**
	 * @param string $type
	 * @param string $name
	 * @throws \App\NotImplementedException
	 * @throws \App\InvalidArgumentException
	 */
	private function defineVariable($type, $name)
	{
		if (isset($this->vars[$name]))
		{
			throw new InvalidArgumentException("Variable '$name' is already defined'");
		}

		if (in_array($type, [self::TYPE_INT, self::TYPE_LIST, self::TYPE_PLURAL]))
		{
			throw new NotImplementedException;
		}

		$args = func_get_args();
		$name = array_shift($args);
		$this->vars[$name] = $args;
	}

	/**
	 * Randomly picks one integer in range
	 * @param string $name
	 * @param int $min
	 * @param int $max
	 */
	public function defineInteger($name, $min, $max)
	{
		$this->defineVariable($name, self::TYPE_INT, $min, $max);
	}

	/**
	 * Randomly picks selects one element
	 * @param string $name
	 * @param string[] $values
	 */
	public function defineList($name, array $values)
	{
		$this->defineVariable($name, self::TYPE_LIST, $values);
	}

	/**
	 * Evaluates value and picks proper declension
	 * @param string $name
	 * @param string $value
	 * @param string $one if |$value| == 1
	 * @param string $few if |$value| in {2,3,4}
	 * @param string $many otherwise
	 */
	public function definePlural($name, $value, $one, $few, $many)
	{
		$this->defineVariable($name, self::TYPE_PLURAL, $value, $one, $few, $many);
	}

	public function setQuestion($question)
	{
		$this->question = $question;
	}

	public function setAnswer($answer)
	{
		$this->answer = $answer;
	}

	public function addHint($hint)
	{
		$this->hints[] = $hint;
	}

	public function validate()
	{
		// TODO validate syntax etc
		return $this->question && $this->answer && $this->hints;
	}

	/**
	 * @return array
	 */
	public function getVariables()
	{
		return $this->vars;
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
