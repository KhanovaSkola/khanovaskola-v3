<?php

namespace App\Orm;


/**
 * Required for all entities that are handled by ElasticSearchMapper
 */
interface IIndexable
{

	/**
	 * Values to be saved to es index
	 * @return array [field => data]
	 */
	public function getIndexData();

}
