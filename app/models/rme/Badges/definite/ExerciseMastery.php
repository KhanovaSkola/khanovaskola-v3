<?php

namespace App\Models\Rme\Badges;

use App\Models\Rme;
use App\Models\Rme\BadgeUserBridges as Bridges;
use Orm;


class ExerciseMastery extends Rme\Badge
{

	/**
	 * @subscribe
	 * @param Rme\User $user
	 * @param Rme\Exercise $exercise
	 */
	public function onCorrectAnswer(Rme\User $user, Rme\Exercise $exercise)
	{
		$blueprint = $exercise->getBlueprint();

		// TODO award after percentage on last N answers reaches X %

		if ($user->getBadges($this->getKey())
			->where('blueprint_id = ?', $blueprint->id)->count() !== 0)
		{
			// already awarded for this blueprint
			return;
		}

		$this->awardTo($user, function(Rme\Badge $badge, Rme\User $user) use ($blueprint) {
			return new Bridges\ExerciseMastery($badge, $user, $blueprint);
		});
	}

}
