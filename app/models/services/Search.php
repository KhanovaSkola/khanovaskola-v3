<?php

namespace App\Models\Services;

use App\Models\Orm\RepositoryContainer;
use App\Models\Rme\Block;
use App\Models\Rme\BlocksMapper;
use App\Models\Rme\ContentsMapper;
use App\Models\Rme\Video;
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

	public function query($query, $limit, $offset, $filterType = NULL)
	{
		$blocks = $this->orm->blocks;
		/** @var BlocksMapper $blocksMapper */
		$blocksMapper = $blocks->getMapper();
		$resBlocks = $blocks->findByFulltext($blocksMapper->getShortEntityName(), $query, $limit, $offset);

		$contentLimit = $filterType ? $limit : max(0, $limit - $resBlocks['hits']['total']);
		$contentOffset = $filterType ? $offset : max(0, $offset - $resBlocks['hits']['total']);

		$contents = $this->orm->contents;
		/** @var ContentsMapper $contentsMapper */
		$contentsMapper = $contents->getMapper();
		$res = $contents->findByFulltext($contentsMapper->getShortEntityName(), $query, $contentLimit, $contentOffset, $filterType);

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
			$entity->highlights = $this->timeSubtitleHighlights($entity, $hls);
			$entity->score = $score;
			$result[] = $entity;
		}

		$aggregations = $res['aggregations']['buckets']['buckets'];
		$blockResults = [];
		if ($count = $resBlocks['hits']['total'])
		{
			if ((!$filterType || $filterType === 'block'))
			{
				foreach ($resBlocks['hits']['hits'] as $hit)
				{
					/** @var Block $block */
					$block = $blocks->getById($hit['_id']);
					$block->score = $hit['_score'];
					$block->highlights = $hit['highlight'];
					$blockResults[] = $block;
				}
			}

			array_unshift($aggregations, [
				'key' => 'block',
				'doc_count' => $count,
			]);


			usort($blockResults, function($a, $b) {
				return $a->score < $b->score ? -1 : 1;
			});
			foreach ($blockResults as $block)
			{
				array_unshift($result, $block);
			}
		}

		$didYouMean = isset($res['suggest']['did_you_mean'][0]['options'][0])
			? $res['suggest']['did_you_mean'][0]['options'][0]['text']
			: NULL;
		$didYouMean = $didYouMean !== $query ? $didYouMean : NULL;

		return new SearchResponse($result, $aggregations, $res['hits']['total'], $didYouMean);
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

	protected function timeSubtitleHighlights($entity, $hls)
	{
		if (!isset($hls['subtitles']))
		{
			return $hls;
		}

		/** @var Video $entity */
		$timed = $entity->getTimedSentences();

		$sentences = [];
		$startAtIndex = 0;
		foreach ($hls['subtitles'] as $highlight)
		{
			$sentence = preg_replace('~{{%/?highlight%}}~', '', $highlight);
			foreach ($timed as $i => $node)
			{
				if ($i < $startAtIndex)
				{
					continue;
				}
				$startAtIndex++;

				if (strpos($node['sentence'], $sentence) !== FALSE)
				{
					$sentences[] = (object) [
						'time' => $node['time'] - 1, // start slightly before the sentence starts
						'sentence' => $highlight,
					];
					break;
				}
			}
		}

		$hls['subtitles'] = $sentences;

		return $hls;
	}

}
