<?php

namespace App\Model;

use Kdyby\Events\Subscriber;
use Nette\DateTime;
use Nette\Utils\Strings;
use Orm;


class UserWeekOldBadgeUserBridge extends BadgeUserBridge
{

	public function getDescriptionArgs()
	{
		return [
			'date' => $this->user->createdAt,
		];
	}

}
