<?php

namespace App\Orm\Mapper;

use Kdyby\Events\EventManager;


trait EventManagerTrait
{

	/** @var EventManager */
	protected $eventManager;

	public function injectEventManager(EventManager $eventManager)
	{
		$this->eventManager = $eventManager;
	}

}
