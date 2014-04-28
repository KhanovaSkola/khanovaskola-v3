<?php

namespace App\Model;

use Nelmio\Alice\Loader\Porm;
use Nette\Caching\Cache;
use Nette\DateTime;
use Orm;


/**
 * @property DateTime $createdAt {default now}
 */
abstract class Entity extends Orm\Entity
{

	/**
	 * For Alice data generator
	 */
	public function __setter($name, $value)
	{
		if ($name === Porm::PERSIST_HACK)
		{
			/** @var Orm\Repository $value */
			$value->attach($this);
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

}
