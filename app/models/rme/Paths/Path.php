<?php

namespace App\Models\Rme;

use App;
use App\InvalidArgumentException;
use App\Models\Orm\Entity;
use App\Models\Orm\TitledEntity;
use Orm;


/**
 * @property array $list
 *
 * @property App\Models\Rme\User|NULL $author {m:1 users $paths}
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
