<?php

namespace App\Models\Rme;

use App;
use App\Models\Orm\Entity;


/**
 * @property App\Models\Rme\Video $video {m:1 videos $views}
 * @property App\Models\Rme\User $user {m:1 users $videosViewed}
 * @property float $percent [0..100]
 * @property float $time seconds
 * @property float $furthest seconds, max time seen (eg if user jumps to second 5, this will be 5)
 * @property string $flow json
 */
class VideoView extends Entity
{

	/**
	 * @param float $percent
	 */
	public function setPercent($percent)
	{
		if ($percent < 0 || $percent > 100)
		{
			throw new App\InvalidArgumentException;
		}

		$this->setValue('percent', $percent);
	}

}
