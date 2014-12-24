<?php

namespace App\Models\Rme\Badges;

use App\Models\Rme\Badge;
use App\Models\Rme\BadgeUserBridges as Bridges;
use App\Models\Rme\User;
use App\Models\Rme\VideoView;
use Orm;


class VideoWatched extends Badge
{

	/**
	 * @subscribe
	 * @param VideoView $view
	 * @param User $user
	 */
	public function onVideoWatched(VideoView $view, $user)
	{
		// TODO make sure its not awarded multiple times in close timespan
		//$this->awardTo($user, function(Badge $badge, $user) use ($view) {
		//	return new Bridges\VideoWatched($badge, $user, $view->video);
		//});
	}

}
