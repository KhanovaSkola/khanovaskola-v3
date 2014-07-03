<?php

namespace App\Models\Orm\Mappers;

use App\Models\Orm\Entity;
use App\Models\Orm\HighlightCollection;
use App\Models\Orm\IIndexable;
use Orm\EventArguments;
use Orm\Events;


/**
 * All entities handled by this mapper must implement IIndexable
 */
class ElasticSearchMapper extends Mapper
{

	use ElasticSearchTrait;

	public function registerEvents(Events $events)
	{
		$events->addCallbackListener($events::PERSIST_AFTER, function(EventArguments $args) {
			/** @var IIndexable|Entity $e */
			$e = $args->entity;
			$this->elastic->addToIndex($this->getShortEntityName(), $e->id, $e->getIndexData());
		});
	}

	public function getWithFulltext($query, array $fields = ['_all'])
	{
		$res = $this->elastic->fulltextSearch($this->getShortEntityName(), $query, $fields);
		if ($res['hits']['total'] === 0)
		{
			return new HighlightCollection();
		}

		$ids = [];
		$highlights = [];
		foreach ($res['hits']['hits'] as $hit)
		{
			$id = (int) $hit['_id'];

			$ids[] = $id;
			$highlights[$id] = isset($hit['highlight']) ? $hit['highlight'] : [];
		}

		$entities = $this->findById($ids)->fetchAll();
		$entities = $this->sortIdByList($entities, $ids);

		$result = new HighlightCollection();
		foreach ($entities as $entity)
		{
			$result->add($entity, $highlights[$entity->id]);
		}

		return $result;
	}

	/**
	 * @param array $entities
	 * @param array $list [position => id]
	 * @return array sorted $entities
	 */
	private function sortIdByList(array $entities, array $list)
	{
		$sorted = [];
		foreach ($entities as $entity)
		{
			$sorted[array_search($entity->id, $list)] = $entity;
		}
		ksort($sorted);
		return $sorted;
	}

}