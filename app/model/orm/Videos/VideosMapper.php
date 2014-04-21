<?php

namespace App\Model;


use App\Services\ElasticSearch;
use Orm\EventArguments;
use Orm\IRepository;


class VideosMapper extends Mapper
{

	/** @var \App\Services\ElasticSearch */
	protected $elastic;

	public function __construct(IRepository $repository, ElasticSearch $elastic)
	{
		parent::__construct($repository);
		$this->elastic = $elastic;

		$events = $repository->getEvents();
		$events->addCallbackListener($events::PERSIST_AFTER, function(EventArguments $args) {
			/** @var Video $e */
			$e = $args->entity;
			$this->elastic->addToIndex($this->getType(), $e->id, [
				'title' => $e->title,
				'description' => $e->description,
				'subtitles' => $e->getSubtitles(),
			]);
		});
	}

	public function getWithFulltext($query)
	{

		//$this->elastic->addMapping($this->getType(), [
		//	'description' => [
		//		'type' => 'string',
		//		'store' => TRUE,
		//		'boost' => 1.2,
		//	],
		//	'subtitles' => [
		//		'type' => 'string',
		//		'store' => TRUE,
		//	],
		//	'title' => [
		//		'type' => 'string',
		//		'store' => TRUE,
		//		'boost' => 1.5,
		//	],
		//]);

		$res = $this->elastic->fulltextSearch($this->getType(), $query, ['title']);
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

		$this->findById($ids)->fetchAll(); // hydrate
		$result = new HighlightCollection();
		foreach ($ids as $id)
		{
			$entity = $this->repository->getIdentityMap()->getById($id);
			$result->add($entity, $highlights[$id]);
		}
		return $result;
	}

}
