<?php

namespace App\Models\Rme;

use App\Models\Orm\Entity;
use Orm\OneToMany as OtM;


/**
 * @property string       $name
 * @property OtM|Schema[] $schemas {1:m schemas $subject}
 * @property string       $color hex
 * @property string       $icon
 */
class Subject extends Entity
{

}
