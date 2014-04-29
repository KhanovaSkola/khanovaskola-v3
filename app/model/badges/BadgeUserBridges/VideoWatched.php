<?php

namespace App\Model\BadgeUserBridges;

use App\Model\Badge;
use App\Model\BadgeUserBridge;
use App\Model\User;
use App\Model\Video;
use Orm;


/**
 * @property \App\Model\Video $video {m:1 videos $videoWatchedBadges}
 */
class VideoWatched extends BadgeUserBridge
{

	public function __construct(Badge $badge, User $user, Video $video)
	{
		parent::__construct($badge, $user);
		$this->video = $video;
	}

	public function getDescriptionArgs()
	{
		return [
			'video' => $this->video->title,
		];
	}

}
