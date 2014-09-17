<?php

namespace App\Models\Rme\BadgeUserBridges;

use App;
use App\Models\Rme;
use App\Models\Rme\Badge;
use App\Models\Rme\Blueprint;
use App\Models\Rme\User;
use Orm;


/**
 * @property Blueprint $blueprint {m:1 contents}
 */
class ExerciseMastery extends Rme\BadgeUserBridge
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
