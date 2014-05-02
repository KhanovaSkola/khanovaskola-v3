<?php

namespace App\Rme\Badges;

use App\Rme\Badge;
use App\Rme\BadgeUserBridges;
use App\Rme\User;
use Nette\DateTime;
use Orm;


class UserOldWeek extends Badge
{

	/** @subscribe */
	public function onLogin(User $user)
	{
		if ($user->getBadges($this->getKey())->count() !== 0)
		{
			// already awarded
			return;
		}

		if ($user->createdAt < DateTime::from('-1 week'))
		{
			$this->awardTo($user, function(Badge $badge, User $user) {
				return new BadgeUserBridges\UserOldWeek($badge, $user);
			});
		}
	}

}
