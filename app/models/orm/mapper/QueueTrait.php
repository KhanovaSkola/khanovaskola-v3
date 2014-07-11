<?php

namespace App\Models\Orm\Mappers;

use App\Models\Services\Queue;


/**
 * Must only be used by Mapper
 */
trait QueueTrait
{

	/**
	 * @var Queue
	 */
	protected $queue;

	public function injectQueue(Queue $queue)
	{
		$this->queue = $queue;
	}

}
