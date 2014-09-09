<?php

namespace App\Models\Rme;

use App\Models\Orm\ContentEntity;
use App\Models\Orm\Entity;
use Orm\OneToMany as OtM;


/**
 * @property string                  $name
 * @property OtM|BlockSchemaBridge[] $blockSchemaBridges {1:m blockSchemaBridges $block}
 * @property User                    $author             {m:1 users $blocksAuthored}
 */
class Block extends Entity
{

}
