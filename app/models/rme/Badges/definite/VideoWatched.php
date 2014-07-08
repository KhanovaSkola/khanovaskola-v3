<?php

namespace App\Models\Rme\Badges;

use App\Models\Rme;
use App\Models\Rme\BadgeUserBridges as Bridges;
use Orm;


class VideoWatched extends Rme\Badge
{

	/**
	 * @subscribe
	 * @param Rme\User $user
	 * @param Rme\Video $video
	 */
	public function onVideoWatched(Rme\User $user, Rme\Video $video)
	{
		$this->awardTo($user, function(Rme\Badge $badge, Rme\User $user) use ($video) {
			return new Bridges\VideoWatched($badge, $user, $video);
		});
	}

}
