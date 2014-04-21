<?php

namespace App\Model;

use Clevis\Skeleton\Orm\DibiMapper;


class Mapper extends DibiMapper
{

	/**
	 * for ElasticSearch
	 * @return string
	 */
	public function getType()
	{
		$class = $this->repository->getEntityClassName();
		return substr($class, strrpos($class, '\\') + 1);
	}

}
