<?php

namespace App\Models\Rme\Badges;

use App\Models\Rme;
use App\Models\Rme\Badge;
use App\Models\Rme\BadgeUserBridges as Bridges;
use App\Models\Rme\User;
use Nette\Utils\DateTime;
use Orm;


class UserOldWeek extends Badge
{

	/**
	 * @subscribe
	 * @param User $user
	 */
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
				return new Bridges\UserOldWeek($badge, $user);
			});
		}
	}

}
