<?php

namespace App\Models\Orm\Mappers;

use App\Models\Orm\Entity;
use App\Models\Orm\IIndexable;
use App\Models\Services\ElasticSearch;
use App\Models\Services\Highlight;
use App\Models\Structs\Highlights\Collection;
use App\Models\Structs\SearchResponse;
use Orm\EventArguments;
use Orm\Events;


/**
 * All entities handled by this mapper must implement IIndexable
 */
class ElasticSearchMapper extends Mapper
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

	protected function findByFulltext($type, $query)
	{
		$args = [
			'index' => ElasticSearch::INDEX,
			'type' => $type,
			'body' => [
				'fields' => ['id'],
				'from' => 0,
				'size' => 10,
				'query' => [
					'multi_match' => [
						'query' => $query,
						'fields' => ['title', 'description'],
					],
				],
				'highlight' => [
					'pre_tags' => [Highlight::START],
					'post_tags' => [Highlight::END],
					'fields' => [
						'title' => ['number_of_fragments' => 0],
						'description' => ['number_of_fragments' => 0],
						'subtitles' => ['number_of_fragments' => 3],
					]
				],
				'aggs' => [
					'buckets' => [
						'terms' => ['field' => 'bucket']
					]
				],
			]
		];

		return $this->elastic->search($args);
	}

	/**
	 * @param $query
	 * @return SearchResponse
	 */
	public function getWithFulltext($query)
	{
		$res = $this->findByFulltext($this->getShortEntityName(), $query);
		if ($res['hits']['total'] === 0)
		{
			return new SearchResponse();
		}

		$ids = [];
		$highlights = [];
		foreach ($res['hits']['hits'] as $hit)
		{
			$id = (int) $hit['_id'];

			$ids[] = $id;
			$highlights[$id] = [isset($hit['highlight']) ? $hit['highlight'] : [], $hit['_score']];
		}

		$entities = $this->findById($ids)->fetchAll();
		$entities = $this->sortIdByList($entities, $ids);

		$result = [];
		foreach ($entities as $entity)
		{
			list($hls, $score) = $highlights[$entity->id];
			$entity->highlights = $hls;
			$entity->score = $score;
			$result[] = $entity;
		}

		return new SearchResponse($result, $res['aggregations']['buckets']['buckets']);
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
