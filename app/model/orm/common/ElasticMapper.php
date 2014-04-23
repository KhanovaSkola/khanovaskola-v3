<?php

namespace App\Model;

use App\Services\ElasticSearch;
use Orm\EventArguments;
use Orm\IRepository;


class ElasticMapper extends Mapper
{

	/** @var \App\Services\ElasticSearch */
	protected $elastic;

	public function __construct(IRepository $repository, ElasticSearch $elastic)
	{
		parent::__construct($repository);
		$this->elastic = $elastic;

		$events = $repository->getEvents();
		$events->addCallbackListener($events::PERSIST_AFTER, function(EventArguments $args) {
			/** @var IIndexable $e */
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
