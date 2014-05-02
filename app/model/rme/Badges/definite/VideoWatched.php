<?php

namespace App\Rme\Badges;

use App\Rme\Badge;
use App\Rme\BadgeUserBridges;
use App\Rme\User;
use App\Rme\Video;
use Orm;


class VideoWatched extends Badge
{

	/** @subscribe */
	public function onVideoWatched(User $user, Video $video)
	{
		$this->awardTo($user, function(Badge $badge, User $user) use ($video) {
			return new BadgeUserBridges\VideoWatched($badge, $user, $video);
		});
	}

}
