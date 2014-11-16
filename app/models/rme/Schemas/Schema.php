<?php

namespace App\Models\Rme;

use App\Models\Orm\Entity;
use Orm\OneToMany as OtM;


/**
 * @property string                  $name
 * @property OtM|BlockSchemaBridge[] $blockSchemaBridges {1:m blockSchemaBridges $schema}
 * @property Subject                 $subject            {m:1 subjects $schemas}
 * @property User                    $author             {m:1 users $schemasAuthored}
 *
 * @property-read Block[] $blocks
 */
class Schema extends Entity
{

	/**
	 * @return Block[]
	 */
	public function getBlocks()
	{
		foreach ($this->blockSchemaBridges as $bridge)
		{
			yield $bridge->block;
		}
	}

}
