<?php

namespace App\Rme\BadgeUserBridges;

use App\Rme\Badge;
use App\Rme\BadgeUserBridge;
use App\Rme\Blueprint;
use App\Rme\User;
use Orm;


/**
 * @property \App\Rme\Blueprint $blueprint {m:1 blueprints}
 */
class ExerciseMastery extends BadgeUserBridge
{

	public function __construct(Badge $badge, User $user, Blueprint $blueprint)
	{
		parent::__construct($badge, $user);
		$this->blueprint = $blueprint;
	}

	public function getTitleArgs()
	{
		return [
			'exercise' => $this->blueprint->title,
		];
	}

}
