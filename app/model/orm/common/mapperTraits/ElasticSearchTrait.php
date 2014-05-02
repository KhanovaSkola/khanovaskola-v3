<?php

namespace App\Model;

use App\Services\ElasticSearch;


trait ElasticSearchTrait
{

	/** @var ElasticSearch */
	protected $elastic;

	public function injectElasticSearch(ElasticSearch $elastic)
	{
		$this->elastic = $elastic;
	}

}
