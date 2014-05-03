<?php

namespace App\Orm\Mapper;

use App\Orm\Entity;
use App\Services\Neo4j;
use Orm\EventArguments;
use Orm\Events;


trait Neo4jTrait
{

	/** @var Neo4j */
	protected $neo4j;

	public function injectNeo4j(Neo4j $neo4j)
	{
		$this->neo4j = $neo4j;
	}

	protected function registerOnPersistCreateNodeEvent(Events $events)
	{
		$events->addCallbackListener($events::PERSIST_AFTER, function(EventArguments $args) {
			/** @var Entity $e */
			$e = $args->entity;

			$node = $this->neo4j->makeNode();
			/** @var Mapper $this */
			$node->setProperties([
				'id' => $e->id,
				'type' => $this->getShortEntityName(),
			])->save();
		});
	}

}
