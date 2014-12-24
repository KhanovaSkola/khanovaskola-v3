<?php

namespace App\Models\Rme;

use App\InvalidArgumentException;
use App\Models\Orm\Entity;
use App\Models\Structs\VideoEvents\Event;


/**
 * @property Video       $video    {m:1 contents $views}
 * @property NULL|Block  $block    {m:1 blocks $views}
 * @property NULL|Schema $schema   {m:1 schemas $views}
 * @property User        $user     {m:1 users $videosViewed}
 * @property float       $percent  {default 0} [0..100] of actually watched
 * @property float       $time     {default 0} seconds actually watched (eg if user watched 0-1 and jumps to 5-7 it will be 3)
 * @property float       $furthest {default 0} seconds, max time seen (eg if user jumps to second 5 it will be 5)
 * @property Event[]     $events
 */
class VideoView extends Entity
{

	public function __construct()
	{
		parent::__construct();
		$this->events = [];
	}

	/**
	 * @param float $percent
	 */
	public function setPercent($percent)
	{
		if ($percent < 0 || $percent > 100)
		{
			throw new InvalidArgumentException;
		}

		$this->setValue('percent', $percent);
	}

	public function addEvent(Event $event)
	{
		$events = $this->events;
		$events[] = $event;
		$this->setValue('events', $events);
	}

}
