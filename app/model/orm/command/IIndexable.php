<?php

namespace App\Model;


use App\Services\ElasticSearch;
use Orm\EventArguments;
use Orm\IRepository;


interface IIndexable
{

	/**
	 * @return array [field => data]
	 */
	public function getIndexData();

}
