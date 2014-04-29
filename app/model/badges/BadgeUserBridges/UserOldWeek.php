<?php

namespace App\Model\BadgeUserBridges;

use App\Model\BadgeUserBridge;
use App\Services\Translator;
use Orm;


class UserOldWeek extends BadgeUserBridge
{

	public function getDescriptionArgs()
	{
		return [
			'date' => $this->user->createdAt,
			Translator::GENDER => $this->user->gender,
		];
	}

}
