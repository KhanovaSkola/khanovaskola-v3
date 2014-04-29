<?php

namespace App\Model;

use Kdyby\Events\Subscriber;
use Nette\DateTime;
use Nette\Utils\Strings;
use Orm;


class VideoWatchedBadge extends Badge
{

	/** @subscribe */
	public function onVideoWatched(User $user, Video $video)
	{
		$this->awardTo($user, function(Badge $badge, User $user) use ($video) {
			return new VideoWatchedBadgeUserBridge($badge, $user, $video);
		});
	}

}
