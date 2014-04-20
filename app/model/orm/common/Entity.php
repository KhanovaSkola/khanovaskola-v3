<?php

namespace App\Model;

use Nelmio\Alice\Loader\Porm;
use Orm;


abstract class Entity extends Orm\Entity
{

	/**
	 * For Alice data generator
	 */
	public function __setter($name, $value)
	{
		if ($name === Porm::PERSIST_HACK)
		{
			/** @var Orm\Repository $value */
			return $value->attach($this);
		}
		$this->$name = $value;
	}

}
