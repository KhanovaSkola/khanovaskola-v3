<?php

namespace App\Models\Rme;

use App\Models\Orm\Entity;


/**
 * @property int    $position
 *
 * @property Schema $schema   {m:1 schemas $blockSchemaBridges}
 * @property Block  $block    {m:1 blocks $blockSchemaBridges}
 */
class BlockSchemaBridge extends Entity
{

}
