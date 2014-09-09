<?php

namespace App\Models\Rme;

use App\Models\Orm\Entity;
use App\Models\Orm\IIndexable;
use App\Models\Orm\TitledEntity;
use Orm\OneToMany as OtM;


/**
 * @property string                   $description
 *
 * @property OtM|ContentBlockBridge[] $contentBlockBridges {1:m contentBlockBridges $content}
 */
class Content extends TitledEntity implements IIndexable
{

}