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

		$this->findById($ids)->fetchAll(); // hydrate // TODO
		$result = new HighlightCollection();
		foreach ($ids as $id)
		{
			$entity = $this->repository->getIdentityMap()->getById($id);
			$result->add($entity, $highlights[$id]);
		}

		return $result;
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
