<?php

namespace App\Models\Rme;

use App\Models\Orm\IIndexable;
use App\Models\Orm\TitledEntity;
use Orm;
use Orm\DibiCollection;


class Tag extends TitledEntity implements IIndexable
{

	const REL_CONTAINS = 'CONTAINS';

	/**
	 * @return array [field => data]
	 */
	public function getIndexData()
	{
		return [
			'title' => $this->title,
		];
	}

	/**
	 * Unlimited depth traversal
	 * @return DibiCollection
	 */
	public function getVideos()
	{
		return $this->model->videos->findByTag($this);
	}

}
