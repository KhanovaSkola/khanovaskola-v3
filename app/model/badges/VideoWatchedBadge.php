<?php

namespace App\Model;

use Kdyby\Events\Subscriber;
use Nette\DateTime;
use Nette\Utils\Strings;
use Orm;


/**
 * @property Orm\OneToMany $badgeUserBridges {1:m badgeUserBridges $badge}
 */
class VideoWatchedBadge extends Badge
{

	/** @subscribe */
	public function onVideoWatched(Video $video, User $user)
	{
		$this->awardTo($user, function(Badge $badge, User $user) use ($video) {
			return new VideoWatchedBadgeUserBridge($badge, $user, $video);
		});
		// TODO send notification to user
	}

}
