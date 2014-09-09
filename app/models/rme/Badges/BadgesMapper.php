<?php

namespace App\Models\Rme;

use App\Models\Orm\Mappers;
use App\Models\Services\Translator;
use Kdyby\Events\EventManager;
use Orm\EventArguments;
use Orm\Events;


class BadgesMapper extends Mappers\Mapper
{

	/**
	 * @var EventManager
	 * @inject
	 */
	public $eventManager;

	/**
	 * @var Translator
	 * @inject
	 */
	public $translator;

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
