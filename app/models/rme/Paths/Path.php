<?php

namespace App\Models\Rme;

use App\InvalidArgumentException;
use App\Models\Orm\Entity;
use App\Models\Orm\TitledEntity;
use Orm;


/**
 * @property TitledEntity[] $list
 * @property User|NULL      $author {m:1 users $paths}
 */
class Path extends Entity
{

	/**
	 * @param TitledEntity[] $entities
	 */
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
