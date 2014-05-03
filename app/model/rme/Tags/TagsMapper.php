<?php

namespace App\Rme;

use App\Orm\Mapper\ElasticSearchMapper;
use App\Orm\Mapper\Neo4jTrait;
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
