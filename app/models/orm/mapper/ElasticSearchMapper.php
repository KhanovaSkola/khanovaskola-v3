<?php

namespace App\Models\Orm\Mappers;

use App\Models\Orm\Entity;
use App\Models\Orm\IIndexable;
use App\Models\Services\ElasticSearch;
use Elasticsearch\Common\Exceptions\Missing404Exception;
use Orm\EventArguments;
use Orm\Events;


/**
 * All entities handled by this mapper must implement IIndexable
 */
abstract class ElasticSearchMapper extends Mapper
{

	/**
	 * @var ElasticSearch
	 * @inject
	 */
	public $elastic;

	public function registerEvents(Events $events)
	{
		$events->addCallbackListener($events::PERSIST_AFTER, function(EventArguments $args) {
			/** @var IIndexable|Entity $e */
			$e = $args->entity;
			$data = $e->getIndexData();
			if ($data === FALSE)
			{
				try
				{
					$this->elastic->removeFromIndex($this->getShortEntityName(), (int) $e->id);
				}
				catch (Missing404Exception $e)
				{
					// entity was yet not in index
				}
			}
			else
			{
				$this->elastic->addToIndex($this->getShortEntityName(), (int) $e->id, $data);
			}
		});
	}

	abstract public function findByFulltext($type, $query, $limit = 10, $offset = 0);

}
