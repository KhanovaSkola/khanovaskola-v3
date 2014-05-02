<?php

namespace App\Model;

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
