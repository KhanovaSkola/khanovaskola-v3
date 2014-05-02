<?php

namespace App\Model;

use App\Services\Translator;
use Kdyby\Events\EventManager;
use Orm\EventArguments;
use Orm\Events;
use Orm\IRepository;


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
