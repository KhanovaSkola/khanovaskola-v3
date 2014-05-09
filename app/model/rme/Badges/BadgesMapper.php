<?php

namespace App\Rme;

use App\Orm\Mapper\EventManagerTrait;
use App\Orm\Mapper\Mapper;
use App\Orm\Mapper\TranslatorTrait;
use Orm\EventArguments;
use Orm\Events;


class BadgesMapper extends Mapper
{

	use EventManagerTrait;
	use TranslatorTrait;

	public function registerEvents(Events $events)
	{
		$events->addCallbackListener($events::HYDRATE_AFTER, function(EventArguments $args) {
			/** @var Badge $entity */
			$entity = $args->entity;
			$entity->injectEventManager($this->eventManager);
			$entity->injectTranslator($this->translator);
		});
	}

}
