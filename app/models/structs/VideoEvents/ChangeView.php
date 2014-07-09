<?php

namespace App\Models\Structs\VideoEvents;


class ChangeView extends Event
{

	/**
	 * @var bool
	 */
	public $isFullscreenNow;

	/**
	 * @param float $at
	 * @param bool $isFullscreenNow
	 * @return ChangeView
	 */
	public static function from($at, $isFullscreenNow)
	{
		$e = new static;
		$e->timeAt = $at;
		$e->isFullscreenNow = $isFullscreenNow;
		return $e;
	}

}
