<?php

namespace App\Models\Rme;

use App\Models\Orm\Entity;
use Orm\OneToMany as OtM;


/**
 * @property string          $name
 * @property OtM|BlockLink[] $blockLinks {1:m blockLinks $schema}
 * @property User            $author     {m:1 users $schemasAuthored}
 */
class Schema extends Entity
{

}
