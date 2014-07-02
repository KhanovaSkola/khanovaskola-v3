<?php

namespace App\Models\Rme\BadgeUserBridges;

use App\Models\Rme;
use Orm;


/**
 * @property Rme\Blueprint $blueprint {m:1 blueprints}
 */
class ExerciseMastery extends Rme\BadgeUserBridge
{

	public function __construct(Rme\Badge $badge, Rme\User $user, Rme\Blueprint $blueprint)
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
