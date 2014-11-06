<?php

namespace App\Models\Rme;

use App\Models\Orm\Entity;
use Orm\OneToMany as OtM;


/**
 * @property string                   $name
 * @property OtM|ContentBlockBridge[] $contentBlockBridges {1:m contentBlockBridges $block}
 * @property OtM|BlockSchemaBridge[]  $blockSchemaBridges  {1:m blockSchemaBridges $block}
 * @property User                     $author              {m:1 users $blocksAuthored}
 */
class Block extends Entity
{

	/**
	 * @return Schema
	 */
	public function getRandomParent()
	{
		/** @var BlockSchemaBridge $bridge */
		$bridge = $this->blockSchemaBridges->get()->fetch();
		return $bridge->schema;
	}

}
