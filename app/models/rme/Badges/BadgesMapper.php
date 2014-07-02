<?php

namespace App\Models\Rme;

use App\Models\Orm\Mappers;
use Orm\EventArguments;
use Orm\Events;


class BadgesMapper extends Mappers\Mapper
{

	use Mappers\EventManagerTrait;
	use Mappers\TranslatorTrait;

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
