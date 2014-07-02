<?php

namespace App\Models\Orm\Mappers;

use App\Models\Services\ElasticSearch;


trait ElasticSearchTrait
{

	/** @var ElasticSearch */
	protected $elastic;

	public function injectElasticSearch(ElasticSearch $elastic)
	{
		$this->elastic = $elastic;
	}

}
