<?php

namespace App\Orm\Mapper;

use App\Services\Queue;


/**
 * Must only be used by Mapper
 */
trait QueueTrait
{

	/** @var Queue */
	protected $queue;

	public function injectQueue(Queue $queue)
	{
		$this->queue = $queue;
	}

}
