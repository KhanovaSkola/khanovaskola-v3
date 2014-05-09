<?php

namespace App\Rme;

use App\Orm\Entity;
use Orm;


/**
 * @property string $answer
 * @property bool $correct
 * @property int $seed
 *
 * @property \App\Rme\User $user {m:1 users $answers}
 * @property \App\Rme\Blueprint $blueprint {m:1 blueprints $answers}
 */
class Answer extends Entity
{

}
