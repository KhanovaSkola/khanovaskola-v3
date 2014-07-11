<?php

namespace App\Models\Rme\BadgeUserBridges;

use App;
use App\Models\Rme;
use App\Models\Rme\Badge;
use App\Models\Rme\User;
use App\Models\Rme\Video;
use Orm;


/**
 * @property Video $video {m:1 videos $videoWatchedBadges}
 */
class VideoWatched extends Rme\BadgeUserBridge
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
