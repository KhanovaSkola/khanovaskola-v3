<?php

namespace App\Models\Orm\Mappers;

use Clevis\Skeleton\Orm\DibiMapper;
use Orm\DibiCollection;
use Orm\Events;


/**
 * @method DibiCollection findById($id)
 */
class Mapper extends DibiMapper
{

	public function registerEvents(Events $events)
	{

	}

	/**
	 * @return string
	 */
	public function getShortEntityName()
	{
		$class = $this->repository->getEntityClassName();
		return ucFirst(substr($class, strrpos($class, '\\') + 1));
	}

}
