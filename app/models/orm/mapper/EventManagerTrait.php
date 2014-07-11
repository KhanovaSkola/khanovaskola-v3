<?php

namespace App\Models\Orm\Mappers;

use Kdyby\Events\EventManager;


/**
 * Must only be used by Mapper
 */
trait EventManagerTrait
{

	/**
	 * @var EventManager
	 */
	protected $eventManager;

	public function injectEventManager(EventManager $eventManager)
	{
		$this->eventManager = $eventManager;
	}

}
