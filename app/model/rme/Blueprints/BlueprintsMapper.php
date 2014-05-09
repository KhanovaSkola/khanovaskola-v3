<?php

namespace App\Rme;

use App\Orm\Mapper\ElasticSearchMapper;
use App\Orm\Mapper\Neo4jTrait;
use Orm\EventArguments;
use Orm\Events;


class BlueprintsMapper extends ElasticSearchMapper
{

	public function registerEvents(Events $events)
	{
		parent::registerEvents($events);

		$keys = ['vars', 'hints'];
		$events->addCallbackListener($events::HYDRATE_BEFORE, function(EventArguments $args) use ($keys) {
			foreach ($keys as $key)
			{
				$args->data[$key] = json_decode($args->data[$key], TRUE);
			}
		});
		$events->addCallbackListener($events::SERIALIZE_BEFORE, function(EventArguments $args) use ($keys) {
			foreach ($keys as $key)
			{
				$args->values[$key] = json_encode($args->values[$key]);
			}
		});
	}

}
