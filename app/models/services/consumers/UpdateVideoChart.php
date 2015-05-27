<?php

namespace App\Models\Services\Consumers;

use App\Models\Orm\RepositoryContainer;
use App\Models\Rme\Video;
use App\Models\Services\Paths;
use App\Models\Structs\VideoEvents;


class UpdateVideoChart extends Consumer
{

	/**
	 * @var Paths
	 */
	private $paths;

	public function __construct(RepositoryContainer $orm, Paths $paths)
	{
		parent::__construct($orm);
		$this->paths = $paths;
	}

	public function invoke(array $args)
	{
		/** @var Video $video */
		$video = $args['video'];

		$seconds = [];
		$norm = $video->views->count();
		foreach ($video->views as $view)
		{
			$time = 0;
			foreach ($view->events as $event)
			{
				for (;$time < $event->timeAt; ++$time)
				{
					@$seconds['watched'][$time]++; // zero if unset
				}

				if ($event instanceof VideoEvents\Seek)
				{
					if ($event->timeTo > $time)
					{
						// skip forward
						for (; $time < $event->timeTo; ++$time)
						{
							@$seconds['watched'][$time] -= $norm / 100; // penalize these seconds
						}
					}
					else
					{
						// jump back, will iterate over same time again on next event
						$time = (int) $event->timeTo;
					}
				}
				else if ($event instanceof VideoEvents\Pause)
				{
					@$seconds['pause'][$time] += max(2, $event->duration); // zero if unset
				}
			}

			for (; $time < $view->furthest; ++$time)
			{
				@$seconds['watched'][$time]++; // zero if unset
			}
		}

		$canvas = imagecreatetruecolor($video->duration, 2);
		$maxWatch = max($seconds['watched']);
		$maxPause = max($seconds['pause']);
		for ($s = 0; $s < $video->duration; ++$s)
		{
			$watched = isset($seconds['watched'][$s]) ? max($seconds['watched'][$s], 0) / $maxWatch : 0;
			$color = imagecolorallocate($canvas, (1-$watched) * 255, (1-$watched) * 255, 255);
			imagesetpixel($canvas, $s, 0, $color);

			$pause = isset($seconds['pause'][$s]) ? max($seconds['pause'][$s], 0) / $maxPause : 0;
			$color = imagecolorallocate($canvas, 255, (1-$pause) * 255, (1-$pause) * 255);
			imagesetpixel($canvas, $s, 1, $color);
		}

		$dir = $this->paths->getVideoCharts();
		@mkdir($dir);
		imagepng($canvas, "$dir/$video->id.png", 9);
	}
}
