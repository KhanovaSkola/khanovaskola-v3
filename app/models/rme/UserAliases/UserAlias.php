<?php

namespace App\Models\Rme;

use App\Models\Orm\Entity;


/**
 * @property string $email
 * @property User   $user {m:1 users $aliases}
 */
class UserAlias extends Entity
{

}
