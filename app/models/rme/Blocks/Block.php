<?php

namespace App\Models\Rme;

use App\Models\Orm\ContentEntity;
use App\Models\Orm\Entity;
use Orm\OneToMany as OtM;


/**
 * @property string          $name
 * @x-property ContentEntity[] $list
 * @property OtM|BlockLink[] $blockLinks {1:m blockLinks $block}
 * @property User            $author     {m:1 users $blocksAuthored}
 */
class Block extends Entity
{

}
