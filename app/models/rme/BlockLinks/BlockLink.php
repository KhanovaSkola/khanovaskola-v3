<?php

namespace App\Models\Rme;

use App\Models\Orm\Entity;


/**
 * @property int    $position
 *
 * @property Schema $schema   {m:1 schemas $blockLinks}
 * @property Block  $block    {m:1 blocks $blockLinks}
 */
class BlockLink extends Entity
{

}
