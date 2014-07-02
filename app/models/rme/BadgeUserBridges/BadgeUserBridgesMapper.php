<?php

namespace App\Models\Rme;

use App\Models\Orm\Mappers;
use Orm\EventArguments;
use Orm\Events;


class BadgeUserBridgesMapper extends Mappers\Mapper
{

	use Mappers\TranslatorTrait;

	public function registerEvents(Events $events)
	{
		$events->addCallbackListener($events::HYDRATE_AFTER, function(EventArguments $args) {
			/** @var BadgeUserBridge $entity */
			$entity = $args->entity;
			$entity->injectTranslator($this->translator);
		});
	}

}
