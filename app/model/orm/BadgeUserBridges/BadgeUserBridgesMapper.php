<?php

namespace App\Model;

use App\Services\Translator;
use Orm\EventArguments;
use Orm\Events;
use Orm\IRepository;


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
