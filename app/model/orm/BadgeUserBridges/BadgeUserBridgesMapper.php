<?php

namespace App\Model;

use App\Services\Translator;
use Orm\EventArguments;
use Orm\IEntity;
use Orm\IRepository;
use Orm\scalar;


class BadgeUserBridgesMapper extends Mapper
{

	public function __construct(IRepository $repository, Translator $translator)
	{
		parent::__construct($repository, $translator);

		$events = $repository->getEvents();
		$events->addCallbackListener($events::HYDRATE_AFTER, function(EventArguments $args) use ($translator) {
			/** @var BadgeUserBridge $entity */
			$entity = $args->entity;
			$entity->injectTranslator($translator);
		});
	}

}
