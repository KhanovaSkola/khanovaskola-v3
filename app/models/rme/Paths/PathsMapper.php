<?php

namespace App\Models\Rme;

use App\Models\Orm\Mappers;
use App\Models\Services\Queue;


class PathsMapper extends Mappers\Mapper
{

	/**
	 * @var Queue
	 * @inject
	 */
	public $queue;

	//	public function registerEvents(Events $events)
	//	{
	//		$events->addCallbackListener($events::SERIALIZE_BEFORE, function(EventArguments $args) {
	//			$args->params['list'] = FALSE;
	//		});
	//		$events->addCallbackListener($events::PERSIST_AFTER, function(EventArguments $args) {
	//			// ...
	//			foreach ($idsToUpdate as $key => $tmp)
	//			{
	//				list($id, $type) = explode('|', $key);
	//				$task = new UpdateSearchIndexTask($type, $id);
	//				$this->queue->enqueue($task);
	//			}
	//
	//		});
	//	}

}
