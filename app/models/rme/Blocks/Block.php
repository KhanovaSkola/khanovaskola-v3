<?php

namespace App\Models\Rme;

use App\Models\Orm\ContentEntity;
use App\Models\Orm\Entity;


/**
 * @property string                $name
 * @property ContentEntity[]|array $list
 * @property Schema[]|array        $schemas
 * @property User                  $author  {m:1 users $blocksAuthored}
 */
class Block extends Entity
{

}
