<?php

namespace App\Models\Rme;

use App\Models\Orm\Entity;


/**
 * @property Content $content {m:1 contents $completions}
 * @property Block   $block   {m:1 blocks $completedContents}
 * @property Schema  $schema  {m:1 schemas $completedContents}
 * @property User    $user    {m:1 users $completedContents}
 */
class CompletedContent extends Entity
{

}
