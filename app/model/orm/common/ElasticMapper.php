<?php

namespace App\Model;

use Orm\EventArguments;
use Orm\Events;


class ElasticMapper extends Mapper
{

	use ElasticSearchTrait;

	public function registerEvents(Events $events)
	{
		$events->addCallbackListener($events::PERSIST_AFTER, function(EventArguments $args) {
			/** @var IIndexable|Entity $e */
			$e = $args->entity;
			$this->elastic->addToIndex($this->getEsType(), $e->id, $e->getIndexData());
		});
	}

	public function getWithFulltext($query, array $fields = ['_all'])
	{
		$res = $this->elastic->fulltextSearch($this->getEsType(), $query, $fields);
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

	/**
	 * @return string
	 */
	public function getEsType()
	{
		$class = $this->repository->getEntityClassName();
		return substr($class, strrpos($class, '\\') + 1);
	}

}
