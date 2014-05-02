<?php

namespace App\Rme;

use App\Orm\Mapper\ElasticMapper;
use App\Orm\Mapper\Neo4jTrait;
use Orm\EventArguments;
use Orm\Events;


class VideosMapper extends ElasticMapper
{

	use Neo4jTrait;

	public function registerEvents(Events $events)
	{
		parent::registerEvents($events);

		$events->addCallbackListener($events::PERSIST_AFTER, function(EventArguments $args) {
			/** @var Video $e */
			$e = $args->entity;

			$node = $this->neo4j->makeNode();
			$node->setProperties([
				'id' => $e->id,
				'type' => $this->getEsType(),
			])->save();
		});
	}

}
