<?php

namespace App\Model;


use App\NotSupportedException;
use Kdyby\Events\Subscriber;
use Nette\DateTime;
use Nette\Utils\Strings;
use Orm;


/**
 * @property \App\Model\Badge $badge {m:1 badges $badgeUserBridges}
 * @property \App\Model\User $user {m:1 users $badgeUserBridges}
 */
abstract class BadgeUserBridge extends Entity
{

	public function __construct(Badge $badge, User $user)
	{
		parent::__construct();

		$this->badge = $badge;
		$this->user = $user;
	}

}
