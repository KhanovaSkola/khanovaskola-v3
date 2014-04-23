<?php

namespace App\Model;


interface IIndexable
{

	/**
	 * @return array [field => data]
	 */
	public function getIndexData();

}
