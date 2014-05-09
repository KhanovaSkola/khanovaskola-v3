<?php

namespace App\Rme\Badges;

use App\Rme\Badge;
use App\Rme\BadgeUserBridges;
use App\Rme\Exercise;
use App\Rme\User;
use App\Rme\Video;
use Orm;


class ExerciseMastery extends Badge
{

	/** @subscribe */
	public function onCorrectAnswer(User $user, Exercise $exercise)
	{
		$blueprint = $exercise->getBlueprint();

		// TODO award after percentage on last N answers reaches X %

		if ($user->getBadges($this->getKey())
			->where('blueprint_id = ?', $blueprint->id)->count() !== 0)
		{
			// already awarded for this blueprint
			return;
		}

		$this->awardTo($user, function(Badge $badge, User $user) use ($blueprint) {
			return new BadgeUserBridges\ExerciseMastery($badge, $user, $blueprint);
		});
	}

}
