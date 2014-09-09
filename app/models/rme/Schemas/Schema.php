<?php

namespace App\Models\Rme;

use App\Models\Orm\Entity;
use Orm\ManyToMany as MtM;


/**
 * @property string      $name
 * @property MtM|Block[] $blocks {m:m blocks $schemas mapped}
 * @property User        $author {m:1 users $schemasAuthored}
 */
class Schema extends Entity
{

}
