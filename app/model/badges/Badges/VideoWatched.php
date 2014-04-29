<?php

namespace App\Model\Badges;

use App\Model\Badge;
use App\Model\BadgeUserBridges;
use App\Model\User;
use App\Model\Video;
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
