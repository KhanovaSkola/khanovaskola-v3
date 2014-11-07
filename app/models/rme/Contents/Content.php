<?php

namespace App\Models\Rme;

use App\Models\Orm\IIndexable;
use App\Models\Orm\TitledEntity;
use Orm\OneToMany as OtM;


/**
 * @property string                   $description
 * @property string                   $type                {enum \App\Models\Rme\ContentsRepository::getClasses()}
 *
 * @property OtM|Comment[]            $comments            {1:m comments $content}
 * @property OtM|ContentBlockBridge[] $contentBlockBridges {1:m contentBlockBridges $content}
 */
abstract class Content extends TitledEntity implements IIndexable
{

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
	 * @return Block
	 */
	public function getRandomParent()
	{
		/** @var ContentBlockBridge $bridge */
		$bridge = $this->contentBlockBridges->get()->fetch();
		return $bridge->block;
	}

}
