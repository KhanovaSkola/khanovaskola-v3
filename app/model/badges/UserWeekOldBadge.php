<?php

namespace App\Model;

use Kdyby\Events\Subscriber;
use Nette\DateTime;
use Nette\Utils\Strings;
use Orm;


class UserWeekOldBadge extends Badge
{

	/** @subscribe */
	public function onLogin(User $user)
	{
		// TODO award only once!
		if ($user->createdAt > DateTime::from('-1 week'))
		{
			$this->awardTo($user, function(Badge $badge, User $user) {
				return new UserWeekOldBadgeUserBridge($badge, $user);
			});
		}
	}

}
