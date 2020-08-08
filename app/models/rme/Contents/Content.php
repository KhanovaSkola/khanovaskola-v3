<?php

namespace App\Models\Rme;

use App\Models\Orm\IIndexable;
use App\Models\Orm\TitledEntity;
use App\Models\Services\Highlight;
use App\NotImplementedException;
use DateTime;
use Nette\Utils\Strings;
use Orm\OneToMany as OtM;


/**
 * @property string                   $type                {enum \App\Models\Rme\ContentsRepository::getClasses()}
 * @property bool                     $hidden              {default TRUE}
 * @property NULL|DateTime            $removedAt
 * @property DateTime                 $createdAt           {default now}
 *
 * @property OtM|Comment[]            $comments            {1:m comments $content}
 * @property OtM|ContentBlockBridge[] $contentBlockBridges {1:m contentBlockBridges $content}
 * @property OtM|CompletedContent[]   $completions         {1:m completedContents $content}
 * @property NULL|User                $author              {m:1 users $contents}
 *
 * @property-read Block[]             $blocks              {ignore}
 */
abstract class Content extends TitledEntity implements IIndexable
{

	/**
	 * Only set for SearchResponse
	 * @var int
	 */
	public $score;

	/**
	 * Only set for SearchResponse
	 * @var mixed
	 */
	public $highlights;

	/**
	 * Values to be saved to es index
	 *
	 * @return FALSE|array [field => data]
	 */
	public function getIndexData()
	{
		if ($this->hidden || ! is_null($this->removedAt))
		{
			return FALSE;
		}

		$blockCount = 0;
		$schemaCount = 0;
		$positions = [];
		foreach ($this->blocks as $block)
		{
			$blockCount++;
			$schemaCount += $block->blockSchemaBridges->count();
			$positions[] = $block->getPositionOf($this);
		}

		if ($blockCount)
		{
			$avgPosition = array_sum($positions) / count($positions);
		}
		else
		{
			// title heuristics
			$number = Strings::match($this->title, '~\s(\d\d?)(?!\.)\D*$~');
			$avgPosition = $number ? $number[1] : 0;
			if ($avgPosition > 20)
			{
				// most probably not number of part
				$avgPosition = 0;
			}
		}

		return [
			'title' => $this->title,
			'suggest' => $this->title,
			'bucket' => $this->type,
			'description' => $this->description,
			'block_count' => $blockCount,
			'schema_count' => $schemaCount,
			'position' => $avgPosition,
		];
	}

	/**
	 * @return NULL|Block
	 */
	public function getRandomParent()
	{
		/** @var ContentBlockBridge $bridge */
		$bridge = $this->contentBlockBridges->get()->fetch();
		if (!$bridge)
		{
			return NULL;
		}
		return $bridge->block;
	}

	/**
	 * @return int seconds
	 */
  public function getDuration() {
		throw new NotImplementedException;
  }

	/**
	 * @return Block[]
	 */
	public function getBlocks()
	{
		foreach ($this->contentBlockBridges as $bridge)
		{
			yield $bridge->block;
		}
	}

	/**
	 * @param $field
	 * @return string safe html
	 */
	public function highlight($field)
	{
		if (isset($this->highlights[$field]))
		{
			$highlights = $this->highlights[$field];
			return Highlight::process(implode(' ', $highlights));
		}

		return $this->getValue($field);
	}

}
