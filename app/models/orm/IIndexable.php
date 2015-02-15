<?php

namespace App\Models\Orm;


/**
 * Required for all entities that are handled by ElasticSearchMapper
 */
interface IIndexable
{

	/**
	 * Values to be saved to es index
	 * If FALSE is returned, the entity is removed from ES.
	 *
	 * @return FALSE|array [field => data]
	 */
	public function getIndexData();

}
