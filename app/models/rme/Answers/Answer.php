<?php

namespace App\Models\Rme;

use App;
use App\Models\Orm\Entity;
use Orm;


/**
 * @property string $answer
 * @property bool $correct
 * @property bool $hint has user seen hint? {default false}
 * @property bool $inactivity browser tab hidden during exercise {default false}
 * @property int $seed
 * @property int $time ms elapsed until answer
 *
 * @property App\Models\Rme\Blueprint $blueprint {m:1 blueprints $answers}
 * @property App\Models\Rme\User $user {m:1 users $answers}
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
