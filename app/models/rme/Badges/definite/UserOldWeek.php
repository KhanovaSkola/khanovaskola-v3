<?php

namespace App\Models\Rme\Badges;

use App\Models\Rme;
use App\Models\Rme\BadgeUserBridges as Bridges;
use Nette\Utils\DateTime;
use Orm;


class UserOldWeek extends Rme\Badge
{

	/** @subscribe */
	public function onLogin(Rme\User $user)
	{
		if ($user->getBadges($this->getKey())->count() !== 0)
		{
			// already awarded
			return;
		}

		if ($user->createdAt < DateTime::from('-1 week'))
		{
			$this->awardTo($user, function(Rme\Badge $badge, Rme\User $user) {
				return new Bridges\UserOldWeek($badge, $user);
			});
		}
	}

}
