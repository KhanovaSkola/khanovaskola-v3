<?php

namespace App\Models\Orm\Mappers;

use App\Models\Orm\RepositoryContainer;
use Clevis\Skeleton\Orm\DibiMapper;
use Nette\Utils\Json;
use Orm\DibiCollection;
use Orm\EventArguments;
use Orm\Events;


/**
 * @method DibiCollection findById($id)
 *
 * @property-read RepositoryContainer $model
 */
class Mapper extends DibiMapper
{

	public function getTableName()
	{
		return (string) parent::getTableName();
	}

	/**
	 * @return string[] properties to persist as json
	 */
	public function getJsonFields()
	{
		return [];
	}

	public function registerEvents(Events $events)
	{
		$keys = $this->getJsonFields();
		$events->addCallbackListener($events::HYDRATE_BEFORE, function (EventArguments $args) use ($keys)
		{
			foreach ($keys as $key)
			{
				if (isset($args->data[$key]))
				{
					$args->data[$key] = Json::decode($args->data[$key]);
				}
			}
		});
		$events->addCallbackListener($events::SERIALIZE_BEFORE, function (EventArguments $args) use ($keys)
		{
			foreach ($keys as $key)
			{
				if (isset($args->values[$key]))
				{
					$args->values[$key] = Json::encode($args->values[$key]);
				}
			}
		});
	}

	/**
	 * @return string
	 */
	public function getShortEntityName()
	{
		$class = $this->repository->getEntityClassName();
		return ucFirst(substr($class, strrpos($class, '\\') + 1));
	}

}
