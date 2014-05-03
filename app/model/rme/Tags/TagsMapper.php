<?php

namespace App\Rme;

use App\Orm\Mapper\ElasticSearchMapper;
use App\Orm\Mapper\Neo4jTrait;
use Everyman\Neo4j\Cypher\Query;
use Everyman\Neo4j\Traversal;
use Orm\Events;


class TagsMapper extends ElasticSearchMapper
{

	use Neo4jTrait;

	public function registerEvents(Events $events)
	{
		parent::registerEvents($events);

		$this->registerOnPersistCreateNodeEvent($events);
	}

}
