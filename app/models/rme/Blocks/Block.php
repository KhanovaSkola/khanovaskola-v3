<?php

namespace App\Models\Rme;

use App\Models\Orm\Entity;
use Orm\OneToMany as OtM;


/**
 * @property string                   $name
 * @property OtM|ContentBlockBridge[] $contentBlockBridges {1:m contentBlockBridges $block}
 * @property OtM|BlockSchemaBridge[]  $blockSchemaBridges  {1:m blockSchemaBridges $block}
 * @property User                     $author              {m:1 users $blocksAuthored}
 *
 * @property Content[]                $contents            {ignore}
 */
class Block extends Entity
{

	/**
	 * @return NULL|Schema
	 */
	public function getRandomParent()
	{
		/** @var BlockSchemaBridge $bridge */
		$bridge = $this->blockSchemaBridges->get()->fetch();
		if (!$bridge)
		{
			return NULL;
		}
		return $bridge->schema;
	}

	/**
	 * @return Content[]
	 */
	public function getContents()
	{
		foreach ($this->contentBlockBridges as $bridge)
		{
			yield $bridge->content;
		}
	}

	/**
	 * @return int seconds
	 */
	public function getDuration()
	{
		$duration = 0;
		foreach ($this->contents as $content)
		{
			$duration += $content->getDuration();
		}
		return $duration;
	}

	/**
	 * @return Content
	 */
	public function getFirstContent()
	{
		foreach ($this->contents as $content)
		{
			return $content;
		}
	}

	public function contains(Content $content)
	{
		return $this->contentBlockBridges->get()->findBy(['contentId' => $content->id])->count();
	}

}
