<?php

namespace App\Model;

use App\Services\Translator;
use Clevis\Skeleton\Orm\DibiMapper;
use Orm\DibiCollection;
use Orm\Events;
use Orm\IRepository;


/**
 * @method DibiCollection findById()
 */
class Mapper extends DibiMapper
{

	public function registerEvents(Events $events)
	{

	}

}
