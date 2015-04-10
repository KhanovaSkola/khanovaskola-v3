<?php

namespace App\Models\Rme;

use App\Models\Orm\Mappers;
use App\Models\Services\Highlight;
use Orm\DibiManyToManyMapper;
use Orm\IRepository;


class BlocksMapper extends Mappers\ElasticSearchMapper
{

	public function findAllButOldWeb()
	{
		return $this->dataSource("
			SELECT * FROM [blocks]
			WHERE [from_old_web] = 'f'
		");
	}

	public function createManyToManyMapper($param, IRepository $targetRepository, $targetParam)
	{
		/** @var DibiManyToManyMapper $mapper */
		$mapper = parent::createManyToManyMapper($param, $targetRepository, $targetParam);

		if ($targetRepository instanceof BlocksRepository)
		{
			$mapper->table = 'block_dependencies';
			$mapper->childParam = 'dependency_id';
			$mapper->parentParam = 'block_id';
		}

		return $mapper;
	}

	/**
	 * @param User $user
	 * @param Block $block
	 * @return NULL|Content|FALSE null for first, FALSE for end
	 */
	public function getNextContent(User $user, Block $block)
	{
		$lastPosition = $this->connection->query('
			SELECT [cbb.position]
			FROM [completed_contents] [cc]
			LEFT JOIN [content_block_bridges] [cbb] ON (
				[cbb.content_id] = [cc.content_id]
			)
			WHERE [cbb.block_id] = ?', $block->id, '
				AND [cc.user_id] = ?', $user->id, '
			ORDER BY [cc.created_at] DESC
			LIMIT 1
		')->fetchSingle();

		if ($lastPosition === FALSE || $lastPosition === NULL) // allow 0
		{
			return NULL;
		}

		$row = $this->connection->query('
			SELECT [cbb.content_id]
			FROM [content_block_bridges] [cbb]
			LEFT JOIN [completed_contents] [cc] ON (
				[cc.content_id] = [cbb.content_id]
				AND [cc.user_id] = ?', $user->id, '
			)
			WHERE [cbb.block_id] = ?', $block->id, '
				AND [cc.id] IS NULL
				AND [cbb.position] > ?', $lastPosition, '
			ORDER BY [cbb.position] ASC
			LIMIT 1
		')->fetch();

		if (!$row)
		{
			return FALSE;
		}

		return $this->model->contents->getById($row['content_id']);
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
				'min_score' => 0.3,
				'query' => [
					'function_score' => [
						'query' => [
							'bool' => [
								'should' => [
									['match' => [
										'title' => ['query' => $query, 'boost' => 10]
									]],
									['match' => ['description' => $query]],
								]
							]
						],
						'score_mode' => 'sum',
						'boost_mode' => 'sum',
						'functions' => [
							[
								'field_value_factor' => [
									'field' => 'from_old_web',
									'factor' => -5,
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
					]
				],
			]
		];

		return $this->elastic->search($args);
	}

}
