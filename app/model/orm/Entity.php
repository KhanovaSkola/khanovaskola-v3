<?php

namespace App\Orm;

use App\Orm\Mapper\Mapper;
use App\Rme\RepositoryContainer;
use Nelmio\Alice\Loader\Porm;
use Nette\Caching\Cache;
use Nette\Utils\DateTime;
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
	 * For Alice data generator
	 */
	public function __setter($name, $value)
	{
		// hack to allow multiple calls to same method
		$name = preg_replace('~_\d+$~', '', $name);

		if ($name === Porm::PERSIST_HACK)
		{
			/** @var Orm\Repository $value */
			$value->attach($this);
		}
		else if (method_exists($this, $name))
		{
			call_user_func_array([$this, $name], is_array($value) ? $value : [$value]);
		}
		else
		{
			$this->$name = $value;
		}
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
		return get_class($this) . 'Highlight';
	}

	public function getShortEntityName()
	{
		/** @var Mapper $mapper */
		$mapper = $this->getRepository()->getMapper();
		return $mapper->getShortEntityName();
	}

}
