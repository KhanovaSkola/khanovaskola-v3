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

	protected function findByFulltext($type, $query, $limit = 10, $offset = 0)
	{
		$args = [
			'index' => $this->elastic->getIndex(),
			'type' => $type,
			'body' => [
				'fields' => ['id'],
				'from' => $offset,
				'size' => $limit,
				'query' => [
					'function_score' => [
						'query' => [
							'multi_match' => [
								'query' => $query,
								'fields' => ['title', 'description', 'subtitles'],
							],
						],
						'score_mode' => 'sum',
						'boost_mode' => 'sum',
						'functions' => [
							[
								'field_value_factor' => [
									'field' => 'schema_count',
									'factor' => 1.2,
								]
							],
							[
								'field_value_factor' => [
									'field' => 'block_count',
									'factor' => 1.1,
								]
							],
							[
								'field_value_factor' => [
									'field' => 'position',
									'factor' => -0.01,
								]
							],
						],
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
	 * @param NULL|int $limit
	 * @param NULL|int $offset
	 * @return SearchResponse
	 */
	public function getWithFulltext($query, $limit = 10, $offset = 0)
	{
		$res = $this->findByFulltext($this->getShortEntityName(), $query, $limit, $offset);
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

		return new SearchResponse($result, $res['aggregations']['buckets']['buckets'], $res['hits']['total']);
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
