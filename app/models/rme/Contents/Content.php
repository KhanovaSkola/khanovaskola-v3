<?php

namespace App\Models\Rme;

use App\Models\Orm\IIndexable;
use App\Models\Orm\TitledEntity;
use App\Models\Services\Highlight;
use Orm\OneToMany as OtM;


/**
 * @property string                   $type                {enum \App\Models\Rme\ContentsRepository::getClasses()}
 *
 * @property OtM|Comment[]            $comments            {1:m comments $content}
 * @property OtM|ContentBlockBridge[] $contentBlockBridges {1:m contentBlockBridges $content}
 * @property OtM|CompletedContent[]   $completions         {1:m completedContents $content}
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
	 * @return array [field => data]
	 */
	public function getIndexData()
	{
		return [
			'title' => $this->title,
			'bucket' => $this->type,
			'suggest' => [
				'input' => $this->title,
				'payload' => [
					'id' => $this->id
				],
			],
			'description' => $this->description,
			'pathStarts' => 0, // set in background worker
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
	abstract public function getDuration();

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
