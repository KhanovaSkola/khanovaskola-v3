<?php

namespace App\Model;

use Kdyby\Events\Subscriber;
use Nette\DateTime;
use Nette\Utils\Strings;
use Orm;


/**
 * @property \App\Model\Video $video {m:1 videos $videoWatchedBadges}
 */
class VideoWatchedBadgeUserBridge extends BadgeUserBridge
{

	public function __construct(Badge $badge, User $user, Video $video)
	{
		parent::__construct($badge, $user);
		$this->video = $video;
	}

}
