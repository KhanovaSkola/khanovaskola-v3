<?php

namespace App\Models\Rme;

use App\Models\Orm\Entity;


/**
 * @property Block  $block  {m:1 blocks $completions}
 * @property Schema $schema {m:1 schemas $completedBlocks}
 * @property User   $user   {m:1 users $completedBlocks}
 */
class CompletedBlock extends Entity
{

}
