<?php

namespace App\Models\Rme;

use App\InvalidArgumentException;
use App\Models\Orm\ContentEntity;
use App\NotImplementedException;
use Orm;


/**
 * @property array    $vars
 * @property string   $question
 * @property string   $answer
 * @property array    $hints
 *
 * @property Answer[] $answers {1:m answers $blueprint}
 */
class Blueprint extends ContentEntity
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
	 * @param array $options
	 * @throws NotImplementedException
	 * @throws InvalidArgumentException
	 */
	private function defineVariable($type, $name, $options)
	{
		if (isset($this->vars[$name]))
		{
			throw new InvalidArgumentException("Variable '$name' is already defined'");
		}

		if (!in_array($type, [self::TYPE_INT, self::TYPE_LIST, self::TYPE_PLURAL]))
		{
			throw new NotImplementedException;
		}

		$vars = $this->vars;
		$vars[$name] = array_merge(['type' => $type], $options);
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
		$this->defineVariable(self::TYPE_INT, $name, [
			'min' => $min,
			'max' => $max,
		]);
	}

	/**
	 * Randomly picks selects one element
	 * @param string $name
	 * @param string[] $values
	 */
	public function defineList($name, array $values)
	{
		$this->defineVariable(self::TYPE_LIST, $name, [
			'list' => $values,
		]);
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
		$this->defineVariable(self::TYPE_PLURAL, $name, [
			'count' => $value,
			'one' => $one,
			'few' => $few,
			'many' => $many
		]);
	}

	public function addHint($hint)
	{
		$hints = $this->hints;
		$hints[] = $hint;
		$this->setValue('hints', $hints);
	}

	/**
	 * @param User $user
	 * @return Orm\DibiCollection|Answer[]
	 */
	public function getRecentAnswersBy(User $user)
	{
		return $this->model->answers->findRecentByUserAndBlueprint($user, $this);
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
			'pathStarts' => 0, // set in background worker
		];
	}

}
