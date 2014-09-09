<?php

namespace App\Models\Rme;

use App\Models\Orm\ContentEntity;
use App\Models\Orm\Entity;
use Orm\ManyToMany as MtM;


/**
 * @property string          $name
 * @property ContentEntity[] $list
 * @property MtM|Schema[]    $schemas {m:m schemas $blocks}
 * @property User            $author  {m:1 users $blocksAuthored}
 */
class Block extends Entity
{

}
