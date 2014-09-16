<?php

namespace App\Models\Rme;

use App\Models\Orm\Mappers\Mapper;
use Orm\EventArguments;
use Orm\Events;


class ContentsMapper extends Mapper
{

	public function registerEvents(Events $events)
	{
		parent::registerEvents($events);

		$keys = ['vars', 'hints'];
		$events->addCallbackListener($events::HYDRATE_BEFORE, function (EventArguments $args) use ($keys)
		{
			foreach ($keys as $key)
			{
				if (isset($args->data[$key]))
				{
					$args->data[$key] = json_decode($args->data[$key]);
				}
			}
		});
		$events->addCallbackListener($events::SERIALIZE_BEFORE, function (EventArguments $args) use ($keys)
		{
			foreach ($keys as $key)
			{
				if (isset($args->values[$key]))
				{
					$args->values[$key] = json_encode($args->values[$key]);
				}
			}
		});
	}

}
