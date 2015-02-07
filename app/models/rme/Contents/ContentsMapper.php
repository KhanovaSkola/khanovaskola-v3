<?php

namespace App\Models\Rme;

use App\Models\Orm\Mappers\ElasticSearchMapper;
use App\Models\Services\Highlight;
use Elasticsearch\Common\Exceptions\BadRequest400Exception;
use Nette\Utils\Json;
use Nette\Utils\Strings;
use Orm\DibiCollection;
use Tracy\Debugger;


class ContentsMapper extends ElasticSearchMapper
{

	/**
	 * @return DibiCollection|Video[]
	 */
	public function findAllVideos()
	{
		return $this->findBy(['type' => 'video']);
	}

	/**
	 * @return DibiCollection|Blueprint[]
	 */
	public function findAllBlueprints()
	{
		return $this->findBy(['type' => 'blueprint']);
	}

	public function getJsonFields()
	{
		return ['vars'];
	}

	public function getShortEntityName()
	{
		return 'content';
	}

	public function getVideoById($id)
	{
		return $this->getBy(['type' => 'video', 'id' => $id]);
	}

	public function getVideoByYoutubeId($youtubeId)
	{
		return $this->getBy(['type' => 'video', 'youtube_id' => $youtubeId]);
	}

	public function getBlueprintById($id)
	{
		return $this->getBy(['type' => 'blueprint', 'id' => $id]);
	}

	/**
	 * @return Content
	 */
	public function getRandom()
	{
		return $this->dataSource('
			SELECT * FROM [contents] WHERE Random() < 0.005 LIMIT 1
		')->fetch();
	}

	/**
	 * @param Content $content
	 * @param NULL|Block $block
	 * @param NULL|Schema $schema
	 * @return array (NULL|Content $content, NULL|Block $block, NULL|Schema $schema)
	 */
	public function getNext(Content $content, Block $block = NULL, Schema $schema = NULL)
	{
		if (!$block)
		{
			$block = $content->getRandomParent();
		}
		if (!$block)
		{
			return [NULL, NULL, NULL];
		}

		$contentPosition = $this->connection->query('
			SELECT [position]
			FROM [content_block_bridges]
			WHERE
				[block_id] = ?', $block->id, '
				AND [content_id] = ?', $content->id, '
		')->fetchSingle();

		if (!$schema && $block)
		{
			$schema = $block->getRandomParent();
		}
		if (!$schema)
		{
			$res = $this->connection->query('
				SELECT [cbb.content_id], [cbb.block_id]
				FROM [content_block_bridges] [cbb]
				WHERE
					[cbb.block_id] = ?', $block->id, '
					AND [cbb.position] > ?', $contentPosition, '
				ORDER BY
					[cbb.position] ASC
			')->fetch();

			return [
				$this->model->contents->getById($res['content_id']),
				$this->model->blocks->getById($res['block_id']),
				NULL,
			];
		}

		$blockPosition = $this->connection->query('
			SELECT [position]
			FROM [block_schema_bridges]
			WHERE
				[schema_id] = ?', $schema->id, '
				AND [block_id] = ?', $block->id, '
		')->fetchSingle();

		$res = $this->connection->query('
			SELECT [cbb.content_id], [cbb.block_id], [bsb.schema_id]
			FROM [block_schema_bridges] [bsb]
			LEFT JOIN [content_block_bridges] [cbb]
				ON [cbb.block_id] = [bsb.block_id]
			WHERE
				[bsb.schema_id] = ?', $schema->id, '
				AND (
					(
						[bsb.position] = ?', $blockPosition, '
						AND [cbb.position] > ?', $contentPosition, '
					)
					OR
					(
						[bsb.position] > ?', $blockPosition, '
					)
				)
			ORDER BY
				[bsb.position] ASC, [cbb.position] ASC
		')->fetch();

		return [
			$this->model->contents->getById($res['content_id']),
			$this->model->blocks->getById($res['block_id']),
			$this->model->schemas->getById($res['schema_id']),
		];
	}

	public function findByFulltext($type, $query, $limit = 10, $offset = 0)
	{
		$args =  [
			'index' => $this->elastic->getIndex(),
			'type' => $type,
			'body' => [
				'fields' => ['id'],
				'from' => $offset,
				'size' => $limit,
				'query' => [
					'function_score' => [
						'query' => [
							'bool' => [
								'should' => [
									['match' => ['title' => $query]],
									['match' => ['description' => $query]],
									['match_phrase' => ['subtitles' => $query]],
									['term' => ['youtube_id' => $query]],
								]
							]
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
				'suggest' => [
					'text' => $query,
					'did_you_mean' => [
						'term' => [
							'field' => 'suggest',
							'size' => 10,
							'sort' => 'frequency',
						]
					]
				],
				'aggs' => [
					'buckets' => [
						'terms' => ['field' => 'bucket']
					]
				],
			]
		];

		try
		{
			return $this->elastic->search($args);
		}
		catch (BadRequest400Exception $e)
		{
			Debugger::getBlueScreen()->addPanel(function() use ($e) {
				$raw= Json::decode($e->getMessage());
				$match = Strings::match($raw->error, '~Failed to parse source \[(.*?)\]+; nested: (.*?);~is');
				$context = Json::decode($match[1]);
				$error = $match[2];
				dump($error, $context);
			});
			throw $e;
		}
	}

}
