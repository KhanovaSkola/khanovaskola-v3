<?php

namespace App\Rme;

use App\Orm\Mapper\EventManagerTrait;
use App\Orm\Mapper\Mapper;
use Orm\EventArguments;
use Orm\Events;


class BadgesMapper extends Mapper
{

	use EventManagerTrait;

	public function registerEvents(Events $events)
	{
		$events->addCallbackListener($events::HYDRATE_AFTER, function(EventArguments $args) {
			/** @var Badge $entity */
			$entity = $args->entity;
			$entity->injectEventManager($this->eventManager);
		});
	}

}
