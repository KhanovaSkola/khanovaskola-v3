<?php

namespace App\Rme;

use App\Orm\Entity;
use Orm;


/**
 * @property string $answer
 * @property bool $correct
 * @property int $seed
 * @property int $time ms elapsed until answer
 * @property bool $inactivity browser tab hidden during exercise {default false}
 *
 * @property \App\Rme\Blueprint $blueprint {m:1 blueprints $answers}
 * @property \App\Rme\User $user {m:1 users $answers}
 */
class Answer extends Entity
{

	public function __construct(Exercise $exercise, $answer)
	{
		parent::__construct();

		$this->blueprint = $exercise->getBlueprint();
		$this->seed = $exercise->getSeed();
		$this->answer = $answer;
	}

}
