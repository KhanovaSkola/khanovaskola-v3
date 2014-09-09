<?php

namespace App\Models\Rme;

use App\Models\Orm\IIndexable;
use App\Models\Orm\TitledEntity;
use Orm;


class Tag extends TitledEntity implements IIndexable
{

	/**
	 * @return array [field => data]
	 */
	public function getIndexData()
	{
		return [
			'title' => $this->title,
		];
	}

}
