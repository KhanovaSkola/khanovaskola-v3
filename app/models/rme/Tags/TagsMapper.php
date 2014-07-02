<?php

namespace App\Models\Rme;

use App\Models\Orm\Mappers;
use Orm\Events;


class TagsMapper extends Mappers\ElasticSearchMapper
{

	use Mappers\Neo4jTrait;

	public function registerEvents(Events $events)
	{
		parent::registerEvents($events);

		$this->registerOnPersistCreateNodeEvent($events);
	}

}
