<?php

namespace App\Models\Rme\BadgeUserBridges;

use App\Models\Rme\BadgeUserBridge;
use App\Models\Services\Translator;
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
