<?php

namespace App\Models\Orm\Mappers;

use App\Models\Orm\Entity;
use App\Models\Orm\IIndexable;
use App\Models\Services\ElasticSearch;
use App\Models\Services\Highlight;
use App\Models\Structs\SearchResponse;
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
			$this->elastic->addToIndex($this->getShortEntityName(), (int) $e->id, $e->getIndexData());
		});
	}

	abstract public function findByFulltext($type, $query, $limit = 10, $offset = 0);

}
