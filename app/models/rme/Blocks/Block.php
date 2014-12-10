<?php

namespace App\Models\Rme;

use App\Models\Orm\TitledEntity;
use Nette\InvalidStateException;
use Orm\ManyToMany as MtM;
use Orm\OneToMany as OtM;


/**
 * @property OtM|ContentBlockBridge[] $contentBlockBridges {1:m contentBlockBridges $block}
 * @property OtM|BlockSchemaBridge[]  $blockSchemaBridges  {1:m blockSchemaBridges $block}
 * @property OtM|CompletedBlock[]     $completions         {1:m completedBlocks $block}
 * @property OtM|CompletedContent[]   $completedContents   {1:m completedContents $block}
 * @property User                     $author              {m:1 users $blocksAuthored}
 * @property MtM|User[]               $editors             {m:m users $blocksEdited}
 *
 * @property Content[]                $contents            {ignore}
 */
class Block extends TitledEntity
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
	 * @return ContentBlockBridge[]
	 */
	public function getContentBlockBridges()
	{
		/** @var OtM $o */
		$o = $this->getValue('contentBlockBridges');
		return $o->get()->orderBy('position', 'ASC');
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
	 * @return int
	 */
	public function countContents()
	{
		return $this->getValue('contentBlockBridges')->get()->count();
	}

	/**
	 * @param Content $content
	 * @return int
	 */
	public function getPositionOf(Content $content)
	{
		// TODO optimize (but you want to use position make sure positions are continuus)
		$position = 1;
		foreach ($this->getContentBlockBridges() as $bridge)
		{
			if ($bridge->content === $content)
			{
				break;
			}
			$position++;
		}
		return $position;
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
		throw new InvalidStateException;
	}

	public function contains(Content $content)
	{
		return $this->getValue('contentBlockBridges')->get()->findBy(['contentId' => $content->id])->count();
	}

}
