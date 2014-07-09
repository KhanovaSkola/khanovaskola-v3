<?php

namespace App\Models\Structs\VideoEvents;


class Skip extends Event
{

	/**
	 * @var float seconds
	 */
	public $timeTo;

	/**
	 * @param float $from seconds
	 * @param float $to seconds
	 * @return Skip
	 */
	public static function from($from, $to)
	{
		$e = new Skip;
		$e->timeAt = $from;
		$e->timeTo = $to;

		return $e;
	}

}
