<?php

namespace App\Orm\Mapper;

use App\NotImplementedException;
use App\Orm\Entity;
use App\Orm\TitledEntity;
use App\Services\Neo4j;
use Orm\EventArguments;
use Orm\Events;


/**
 * Must only be used by Mapper
 */
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
		$events->addCallbackListener($events::PERSIST_AFTER_INSERT, function(EventArguments $args) {
			/** @var TitledEntity $e */
			$e = $args->entity;

			$node = $this->neo4j->makeNode();
			/** @var Mapper|Neo4jTrait $this */
			$node->setProperty('eid', $e->id)->save();
			$node->setProperty('slug', $e->slug)->save();

			$label = $this->neo4j->makeLabel(ucFirst($this->getShortEntityName()));
			$node->addLabels([$label]);
		});

		$events->addCallbackListener($events::PERSIST_AFTER_UPDATE, function(EventArguments $args) {
			// TODO find node and update slug if changed
			throw new NotImplementedException;
		});
	}

}
