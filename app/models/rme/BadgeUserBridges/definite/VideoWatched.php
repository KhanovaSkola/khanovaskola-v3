<?php

namespace App\Models\Rme\BadgeUserBridges;

use App\Models\Rme;
use Orm;


/**
 * @property Rme\Video $video {m:1 videos $videoWatchedBadges}
 */
class VideoWatched extends Rme\BadgeUserBridge
{

	public function __construct(Rme\Badge $badge, Rme\User $user, Rme\Video $video)
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
