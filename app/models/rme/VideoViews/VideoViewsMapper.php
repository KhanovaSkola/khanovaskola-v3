<?php

namespace App\Models\Rme;

use App\Models\Orm\Mappers\Mapper;
use Nette\Utils\DateTime;
use Orm\EventArguments;
use Orm\Events;


class VideoViewsMapper extends Mapper
{

	public function registerEvents(Events $events)
	{
		parent::registerEvents($events);

		$key = 'events';
		$events->addCallbackListener($events::HYDRATE_BEFORE, function(EventArguments $args) use ($key) {
			$data = json_decode($args->data[$key], TRUE);
			$events = [];
			foreach ($data as $row)
			{
				$event = new $row['_class'];
				unset($row['_class']);
				foreach ($row as $prop => $val)
				{
					$event->$prop = $val;
				}
				$events[] = $event;
			}

			$args->data[$key] = $events;
		});
		$events->addCallbackListener($events::SERIALIZE_BEFORE, function(EventArguments $args) use ($key) {
			$args->values[$key] = json_encode($args->values[$key] ?: []);
		});
	}

	/**
	 * @return void
	 *
	 * Results of this function are periodically deleted
	 * from production database. Update with caution!
	 */
	public function deleteOldEmpty()
	{
		$this->connection->query('
			DELETE FROM [video_views]
			WHERE [percent] = 0
				AND [time] = 0
				AND [furthest] = 0
				AND [events]::text = "[]"
				AND [created_at] < ?
		', DateTime::from('7 days ago'));
	}

}
