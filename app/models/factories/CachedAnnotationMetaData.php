<?php

namespace App\Models\Factories;

use App\Models\Orm\AnnotationMetaData;
use Nette\Caching\Cache;
use Nette\Caching\IStorage;
use Nette\DI\Container;
use Nette\Object;


class CachedAnnotationMetaData extends Object
{

	/**
	 * @var IStorage
	 */
	private $storage;

	/**
	 * @var Container
	 */
	private $context;

	public function __construct(IStorage $storage, Container $context)
	{
		$this->storage = $storage;
		$this->context = $context;
	}

	/**
	 * @return AnnotationMetaData
	 */
	public function create()
	{
		$cache = new Cache($this->storage, __CLASS__);
		$raw = $cache->load(__METHOD__, function() {
			return $this->context->getService('');
		});
	}

}
