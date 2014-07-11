<?php

namespace App\Models\Orm\Mappers;

use App\Models\Orm\ContentEntity;
use App\Models\Orm\Entity;
use App\Models\Services\Neo4j;
use App\NotImplementedException;
use Everyman\Neo4j\Query\Row;
use Orm\EventArguments;
use Orm\Events;


/**
 * Must only be used by Mapper
 */
trait Neo4jTrait
{

	/**
	 * @var Neo4j
	 */
	protected $neo4j;

	public function injectNeo4j(Neo4j $neo4j)
	{
		$this->neo4j = $neo4j;
	}

	protected function registerOnPersistCreateNodeEvent(Events $events)
	{
		$events->addCallbackListener($events::PERSIST_AFTER_INSERT, function(EventArguments $args) {
			/** @var Entity $e */
			$e = $args->entity;

			$node = $this->neo4j->makeNode();
			/** @var Mapper|Neo4jTrait $this */
			$node->setProperty('eid', $e->id)->save();

			$label = $this->neo4j->makeLabel($this->getShortEntityName());
			$node->addLabels([$label]);

			if ($e instanceof ContentEntity)
			{
				$label = $this->neo4j->makeLabel('Content');
				$node->addLabels([$label]);
			}
		});
	}

	protected function getEntityTypeFromLabels(Row $row)
	{
		$types = iterator_to_array($row);
		$allowed = ['Video', 'Blueprint'];
		foreach ($allowed as $type)
		{
			if (in_array($type, $types))
			{
				return $type;
			}
		}
		throw new NotImplementedException;
	}

}
