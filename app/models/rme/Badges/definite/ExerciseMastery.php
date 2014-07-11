<?php

namespace App\Models\Rme\Badges;

use App\Models\Rme;
use App\Models\Rme\Badge;
use App\Models\Rme\BadgeUserBridges as Bridges;
use App\Models\Rme\Exercise;
use App\Models\Rme\User;
use Orm;


class ExerciseMastery extends Badge
{

	/**
	 * @subscribe
	 * @param User $user
	 * @param Exercise $exercise
	 */
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
			return new Bridges\ExerciseMastery($badge, $user, $blueprint);
		});
	}

}
