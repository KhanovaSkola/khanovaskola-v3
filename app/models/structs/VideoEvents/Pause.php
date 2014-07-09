<?php

namespace App\Models\Structs\VideoEvents;


class Pause extends Event
{

	/**
	 * @var float seconds
	 */
	public $duration;

	/**
	 * @param float $at seconds
	 * @param float $duration seconds
	 * @return Pause
	 */
	public static function from($at, $duration)
	{
		$e = new Pause;
		$e->timeAt = $at;
		$e->duration = $duration;

		return $e;
	}

}
