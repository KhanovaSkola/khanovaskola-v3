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
	 * example: App\VideosRepository => video
	 * @return string
	 */
	public function getShortEntityName()
	{
		$class = $this->repository->getEntityClassName();
		return lcFirst(substr($class, strrpos($class, '\\') + 1));
	}

}
