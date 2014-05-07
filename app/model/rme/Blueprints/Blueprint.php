<?php

namespace App\Rme;

use App\InvalidArgumentException;
use App\NotImplementedException;
use App\Orm\IIndexable;
use App\Orm\TitledEntity;
use Nette\Utils\Strings;
use Orm;


/**
 * @property string $description
 * @property array $vars
 * @property string $question
 * @property string $answer
 * @property array $hints
 */
class Blueprint extends TitledEntity implements IIndexable
{

	const TYPE_INT = 'integer';
	const TYPE_LIST = 'list';
	const TYPE_PLURAL = 'plural';

	public function __construct()
	{
		parent::__construct();
		$this->hints = [];
		$this->vars = [];
	}

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

		$vars = $this->vars;
		$vars[$name] = $args;
		$this->setValue('vars', $vars);
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

	public function addHint($hint)
	{
		$hints = $this->hints;
		$hints[] = $hint;
		$this->setValue('hints', $hints);
	}

	/**
	 * Values to be saved to es index
	 *
	 * @return array [field => data]
	 */
	public function getIndexData()
	{
		return [
			'title' => $this->title,
			'description' => $this->description,
		];
	}

}
