<?php

namespace App\Models\Structs\VideoEvents;


class Seek extends Event
{

	/**
	 * @var float seconds
	 */
	public $timeTo;

	/**
	 * @param float $from seconds
	 * @param float $to seconds
	 * @return Seek
	 */
	public static function from($from, $to)
	{
		$e = new Seek;
		$e->timeAt = $from;
		$e->timeTo = $to;

		return $e;
	}

}
