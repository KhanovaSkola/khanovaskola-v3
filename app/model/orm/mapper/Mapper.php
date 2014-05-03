<?php

namespace App\Orm\Mapper;

use Clevis\Skeleton\Orm\DibiMapper;
use Orm\DibiCollection;
use Orm\Events;


/**
 * @method DibiCollection findById()
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
		return substr($class, strrpos($class, '\\') + 1);
	}

}
