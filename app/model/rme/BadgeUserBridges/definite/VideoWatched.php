<?php

namespace App\Rme\BadgeUserBridges;

use App\Rme\Badge;
use App\Rme\BadgeUserBridge;
use App\Rme\User;
use App\Rme\Video;
use Orm;


/**
 * @property \App\Rme\Video $video {m:1 videos $videoWatchedBadges}
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
