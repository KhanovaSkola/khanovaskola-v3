<?php

namespace App\Models\Rme;

use App\Models\Orm\IIndexable;
use App\Models\Orm\TitledEntity;
use Orm\OneToMany as OtM;


/**
 * @property string                   $description
 * @property string                   $type                {enum App\Models\Rme\ContentsRepository::getTypes()}
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
			'description' => $this->description,
		];
	}

}
