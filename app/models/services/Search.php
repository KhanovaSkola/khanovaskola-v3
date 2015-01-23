<?php

namespace App\Models\Services;

use App\Models\Orm\RepositoryContainer;
use App\Models\Rme\BlocksMapper;
use App\Models\Rme\ContentsMapper;
use App\Models\Structs\SearchResponse;


class Search
{

	/**
	 * @var RepositoryContainer
	 */
	private $orm;

	public function __construct(RepositoryContainer $orm)
	{
		$this->orm = $orm;
	}

	public function query($query, $limit, $offset)
	{
		$blocks = $this->orm->blocks;
		/** @var BlocksMapper $blocksMapper */
		$blocksMapper = $blocks->getMapper();
		$resBlocks = $blocks->findByFulltext($blocksMapper->getShortEntityName(), $query, $limit, $offset);

		$contentLimit = max(0, $limit - $resBlocks['hits']['total']);
		$contentOffset = max(0, $offset - $resBlocks['hits']['total']);

		$contents = $this->orm->contents;
		/** @var ContentsMapper $contentsMapper */
		$contentsMapper = $contents->getMapper();
		$res = $contents->findByFulltext($contentsMapper->getShortEntityName(), $query, $contentLimit, $contentOffset);

		$ids = [];
		$highlights = [];
		foreach ($res['hits']['hits'] as $hit)
		{
			$id = (int) $hit['_id'];

			$ids[] = $id;
			$highlights[$id] = [isset($hit['highlight']) ? $hit['highlight'] : [], $hit['_score']];
		}

		$entities = $contents->findById($ids)->fetchAll();
		$entities = $this->sortIdByList($entities, $ids);

		$result = [];
		foreach ($entities as $entity)
		{
			list($hls, $score) = $highlights[$entity->id];
			$entity->highlights = $hls;
			$entity->score = $score;
			$result[] = $entity;
		}

		$aggregations = $res['aggregations']['buckets']['buckets'];
		if ($count = $resBlocks['hits']['total'])
		{
			foreach ($resBlocks['hits']['hits'] as $hit)
			{
				$block  = $blocks->getById($hit['_id']);
				$block->score = $hit['_score'];
				array_unshift($result, $block);
			}

			array_unshift($aggregations, [
				'key' => 'block',
				'doc_count' => $count,
			]);
		}

		return new SearchResponse($result, $aggregations, $res['hits']['total']);
	}


	/**
	 * @param array $entities
	 * @param array $list [position => id]
	 * @return array sorted $entities
	 */
	protected function sortIdByList(array $entities, array $list)
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
