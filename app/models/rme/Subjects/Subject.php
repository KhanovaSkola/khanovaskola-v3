<?php

namespace App\Models\Rme;

use App\Models\Orm\TitledEntity;
use Orm\ManyToMany as MtM;
use Orm\OneToMany as OtM;


/**
 * @property OtM|Schema[] $schemas {1:m schemas $subject}
 * @property string       $color hex
 * @property string       $icon
 * @property MtM|User[]   $editors {m:m users $subjectsEdited}
 */
class Subject extends TitledEntity
{

}
