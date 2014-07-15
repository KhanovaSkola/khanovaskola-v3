<?php

namespace App\Models\Rme;

use App\Models\Orm\Entity;


/**
 * @property string  $name
 * @property Block[] $blocks {ignore} {m:m blocks $schemas} mapped in neo4j
 * @property User    $author {m:1 users $schemasAuthored}
 */
class Schema extends Entity
{

}
