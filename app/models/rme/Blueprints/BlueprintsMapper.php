<?php

namespace App\Models\Rme;

use App\Models\Orm\Mappers;
use Orm\EventArguments;
use Orm\Events;


class BlueprintsMapper extends Mappers\ContentMapper
{

	public function registerEvents(Events $events)
	{
		parent::registerEvents($events);

		$keys = ['vars', 'hints'];
		$events->addCallbackListener($events::HYDRATE_BEFORE, function(EventArguments $args) use ($keys) {
			foreach ($keys as $key)
			{
				$args->data[$key] = json_decode($args->data[$key]);
			}
		});
		$events->addCallbackListener($events::SERIALIZE_BEFORE, function(EventArguments $args) use ($keys) {
			foreach ($keys as $key)
			{
				$args->values[$key] = json_encode($args->values[$key]);
			}
		});
	}

	public function findByTag(Tag $tag)
	{
		return parent::findByTagByType($tag, 'Blueprint');
	}

}
