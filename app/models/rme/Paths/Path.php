<?php

namespace App\Models\Rme;

use App\InvalidArgumentException;
use App\Models\Orm\Entity;
use App\Models\Orm\TitledEntity;
use Orm;


/**
 * @property array $list
 *
 * @property User|NULL $author
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
