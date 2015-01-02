<?php

namespace App\Models\Orm;

use App\Models\Orm\Mappers\Mapper;
use DateTime;
use Nette\Caching\Cache;
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
		return AnnotationMetaData::getMetaData($entityClass);
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

	/**
	 * @return Highlight
	 */
	public function getHighlightEntityName()
	{
		return str_replace('\\Rme\\', '\\Structs\\Highlights\\', get_class($this));
	}

	public function getShortEntityName()
	{
		/** @var Mapper $mapper */
		$mapper = $this->getRepository()->getMapper();
		return $mapper->getShortEntityName();
	}

}
