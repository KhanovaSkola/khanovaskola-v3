<?php

namespace App\Models\Rme;

use App\Models\Orm\Entity;
use Orm\OneToMany as OtM;


/**
 * @property string                  $name
 * @property OtM|BlockSchemaBridge[] $blockSchemaBridges {1:m blockSchemaBridges $schema}
 * @property Subject                 $subject            {m:1 subjects $schemas}
 * @property User                    $author             {m:1 users $schemasAuthored}
 * @property OtM|CompletedBlock[]    $completedBlocks    {1:m completedBlocks $schema}
 * @property OtM|CompletedContent[]  $completedContents  {1:m completedContents $schema}
 *
 * @property Block[]                 $blocks             {ignore}
 */
class Schema extends Entity
{

	/**
	 * @return BlockSchemaBridge[]
	 */
	public function getBlockSchemaBridges()
	{
		/** @var OtM $o */
		$o = $this->getValue('blockSchemaBridges');
		return $o->get()->orderBy('position', 'ASC');
	}

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

	/**
	 * @return int seconds
	 */
	public function getDuration()
	{
		$duration = 0;
		foreach ($this->blocks as $block)
		{
			$duration += $block->getDuration();
		}
		return $duration;
	}

	/**
	 * @return Block
	 */
	public function getFirstBlock()
	{
		foreach ($this->blocks as $block)
		{
			return $block;
		}
	}

	public function contains(Block $block)
	{
		return $this->blockSchemaBridges->get()->findBy(['blockId' => $block->id])->count();
	}

}
