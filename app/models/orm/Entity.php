<?php

namespace App\Models\Orm;

use App\Models\Orm\Mappers\Mapper;
use DateTime;
use Nette\Caching\Cache;
use Nette\Caching\IStorage;
use Nette\DI\Container;
use Orm;


/**
 * @property DateTime $createdAt {default now}
 *
 * @property-read RepositoryContainer $model {ignore}
 */
abstract class Entity extends Orm\Entity
{

	use ConstantGetterTrait;

	/**
	 * @var IStorage
	 */
	public static $metaDataStorage;

	/**
	 * @return Container
	 */
	protected function getContainer()
	{
		return $this->getModel()->getContext()->getService('container');
	}

	/**
	 * Adds support for FQN annotations
	 * @param $entityClass
	 * @return Orm\MetaData
	 */
	public static function createMetaData($entityClass)
	{
		$cache = new Cache(self::$metaDataStorage, __CLASS__);
		return $cache->load($entityClass, function() use ($entityClass) {
			return AnnotationMetaData::getMetaData($entityClass);
		});
	}

	/**
	 * @return Cache
	 */
	public function getCache()
	{
		/** @var Repository $model */
		$model = $this->getModel();
		return $model->getCache();
	}

	public function getShortEntityName()
	{
		/** @var Mapper $mapper */
		$mapper = $this->getRepository()->getMapper();
		return $mapper->getShortEntityName();
	}

}
