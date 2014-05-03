<?php

namespace App\Rme;

use App\Orm\IIndexable;
use App\Orm\TitledEntity;
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
