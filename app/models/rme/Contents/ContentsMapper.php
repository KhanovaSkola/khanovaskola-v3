<?php

namespace App\Models\Rme;

use App\Models\Orm\Mappers\ElasticSearchMapper;
use App\Models\Services\Highlight;
use Orm\DibiCollection;


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
	 * @return DibiCollection|KaExercise[]
	 */
	public function findAllKaExercises()
	{
		return $this->findBy(['type' => 'ka_exercise']);
	}

	/**
	 * @return DibiCollection|KaArticles[]
	 */
	public function findAllKaArticles()
	{
		return $this->findBy(['type' => 'ka_article']);
	}

	/**
	 * @return DibiCollection|KaVideo[]
	 */
	public function findAllKaVideos()
	{
		return $this->findBy(['type' => 'ka_video']);
	}

	/**
	 * @return DibiCollection|Blackboard[]
	 */
	public function findAllBlackboards()
	{
		return $this->findBy(['type' => 'blackboard']);
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

	public function getKaArticleById($id)
	{
		return $this->getBy(['type' => 'ka_article', 'id' => $id]);
	}

	public function getKaExerciseById($id)
	{
		return $this->getBy(['type' => 'ka_exercise', 'id' => $id]);
	}

	public function getKaVideoById($id)
	{
		return $this->getBy(['type' => 'ka_video', 'id' => $id]);
	}

	public function getVideoByYoutubeId($youtubeId)
	{
            
            $video = $this->getBy(['type' => 'video', 'youtube_id' => $youtubeId]);
            return $video;

            /*

            if (!$video) { // Try also search among original english videos

                return $this->getBy(['type' => 'video', 'youtube_id_original' => $youtubeId]);

            } else {

               return $video;

            }
             */
	}

  /*
	public function getKaVideoByYoutubeId($youtubeId)
	{
		return $this->getBy(['type' => 'ka_video', 'youtube_id' => $youtubeId]);
  }
   */

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

	public function findByFulltext($type, $query, $limit = 10, $offset = 0, $filterType = NULL)
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
									['term' => ['youtube_original_id' => $query]],
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
						'phrase' => [
							'field' => 'suggest',
							'size' => 3,
							'confidence' => 0.5,
							'max_errors' => 3
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

		if ($filterType)
		{
			$args['body']['post_filter'] = [
				'term' => [
					'bucket' => $filterType,
				]
			];
		}

		return $this->elastic->search($args);
	}

	/**
	 * @return \Orm\DataSourceCollection
	 */
	public function findVideosWithoutDuration()
	{
		return $this->dataSource("
			SELECT * FROM [contents]
			WHERE ([type] = 'video')
				AND ([duration] IS NULL OR [duration] = 1200)
		");
	}

}
