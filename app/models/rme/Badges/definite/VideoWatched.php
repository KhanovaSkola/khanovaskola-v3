<?php

namespace App\Models\Rme\Badges;

use App\Models\Rme\Badge;
use App\Models\Rme\BadgeUserBridges as Bridges;
use App\Models\Rme\User;
use App\Models\Rme\Video;
use Orm;


class VideoWatched extends Badge
{

	/**
	 * @subscribe
	 * @param User $user
	 * @param Video $video
	 */
	public function onVideoWatched(User $user, Video $video)
	{
		$this->awardTo($user, function(Badge $badge, User $user) use ($video) {
			return new Bridges\VideoWatched($badge, $user, $video);
		});
	}

}
