<?php

namespace App\Rme;

use App\Orm\Mapper\Mapper;
use App\Orm\Mapper\TranslatorTrait;
use Orm\EventArguments;
use Orm\Events;


class BadgeUserBridgesMapper extends Mapper
{

	use TranslatorTrait;

	public function registerEvents(Events $events)
	{
		$events->addCallbackListener($events::HYDRATE_AFTER, function(EventArguments $args) {
			/** @var BadgeUserBridge $entity */
			$entity = $args->entity;
			$entity->injectTranslator($this->translator);
		});
	}

}
