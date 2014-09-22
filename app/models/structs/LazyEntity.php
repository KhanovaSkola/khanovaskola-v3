<?php

namespace App\Models\Structs;

use App\Models\Orm\Entity;


class LazyEntity
{

	/**
	 * @var callable
	 */
	private $getter;

	/**
	 * @var Entity
	 */
	private $entity;

	/**
	 * @param callable $getter
	 */
	public function __construct($getter)
	{
		$this->getter = $getter;
	}

	/**
	 * @return Entity
	 */
	private function getOrCreate()
	{
		if (!$this->entity)
		{
			$cb = $this->getter;
			$this->entity = $cb();
		}

		return $this->entity;
	}

	public function __get($name)
	{
		return $this->getOrCreate()->$name;
	}

	public function __set($name, $value)
	{
		return $this->getOrCreate()->$name = $value;
	}

	public function __call($name, $args)
	{
		return call_user_func_array([$this->getOrCreate(), $name], $args);
	}

	public function __toString()
	{
		return (string) $this->getOrCreate()->__toString();
	}

}
