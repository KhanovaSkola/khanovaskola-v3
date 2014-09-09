<?php

namespace App\Models\Rme;

use App\Models\Orm\Entity;


/**
 * @property int     $position
 *
 * @property Content $content {m:1 contents $contentBlockBridges}
 * @property Block   $block   {m:1 blocks $contentBlockBridges}
 */
class ContentBlockBridge extends Entity
{

}
