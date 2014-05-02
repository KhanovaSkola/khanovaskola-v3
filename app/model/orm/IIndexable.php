<?php

namespace App\Orm;


interface IIndexable
{

	/**
	 * @return array [field => data]
	 */
	public function getIndexData();

}
