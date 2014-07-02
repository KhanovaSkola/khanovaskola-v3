<?php

namespace App\Models\Rme\BadgeUserBridges;

use App\Models\Rme;
use App\Models\Services\Translator;
use Orm;


class UserOldWeek extends Rme\BadgeUserBridge
{

	public function getDescriptionArgs()
	{
		return [
			'date' => $this->user->createdAt,
			Translator::GENDER => $this->user->gender,
		];
	}

}
