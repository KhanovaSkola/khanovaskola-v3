<?php

namespace App\Model\Badges;

use App\Model\Badge;
use App\Model\BadgeUserBridges;
use App\Model\User;
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

		if ($user->createdAt > DateTime::from('-1 week'))
		{
			$this->awardTo($user, function(Badge $badge, User $user) {
				return new BadgeUserBridges\UserOldWeek($badge, $user);
			});
		}
	}

}
