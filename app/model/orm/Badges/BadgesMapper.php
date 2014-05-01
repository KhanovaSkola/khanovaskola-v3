<?php

namespace App\Model;

use App\Services\Translator;
use Kdyby\Events\EventManager;
use Orm\EventArguments;
use Orm\IRepository;


class BadgesMapper extends Mapper
{

	public function __construct(IRepository $repository, Translator $translator, EventManager $eventManager)
	{
		parent::__construct($repository, $translator);

		$events = $repository->getEvents();
		$events->addCallbackListener($events::HYDRATE_AFTER, function(EventArguments $args) use ($eventManager) {
			/** @var Badge $entity */
			$entity = $args->entity;
			$entity->injectEventManager($eventManager);
		});
	}

}
