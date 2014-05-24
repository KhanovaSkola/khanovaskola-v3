<?php

namespace App\Rme;

use App\InvalidArgumentException;
use App\Orm\Entity;
use App\Orm\TitledEntity;
use Orm;


/**
 * @property array $list
 *
 * @property \App\Rme\User|NULL $author
 */
class Path extends Entity
{

	public function setList(array $entities)
	{
		foreach ($entities as $entity)
		{
			if (! $entity instanceof TitledEntity)
			{
				throw new InvalidArgumentException;
			}
		}
		$this->setValue('list', $entities);
	}

}
