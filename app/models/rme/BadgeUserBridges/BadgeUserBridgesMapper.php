<?php

namespace App\Models\Rme;

use App\Models\Orm\Mappers;
use App\Models\Services\Translator;
use Orm\EventArguments;
use Orm\Events;


class BadgeUserBridgesMapper extends Mappers\Mapper
{

	/**
	 * @var Translator
	 * @inject
	 */
	public $translator;

	public function registerEvents(Events $events)
	{
		$events->addCallbackListener($events::HYDRATE_AFTER, function(EventArguments $args) {
			/** @var BadgeUserBridge $entity */
			$entity = $args->entity;
			$entity->injectTranslator($this->translator);
		});
	}

}
