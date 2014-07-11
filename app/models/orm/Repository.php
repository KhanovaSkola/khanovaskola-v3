<?php

namespace App\Models\Orm;

use Nette\Caching\Cache;
use Orm;
use Orm\IRepositoryContainer;


abstract class Repository extends Orm\Repository
{

	/**
	 * @var Cache
	 */
	protected $cache;

	public function __construct(IRepositoryContainer $model)
	{
		parent::__construct($model);
		/** @var Repository $model */
		$this->cache = $model->getCache();
	}

	/**
	 * @return Cache
	 */
	public function getCache()
	{
		return $this->cache;
	}

}
