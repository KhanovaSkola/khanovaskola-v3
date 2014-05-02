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

}
