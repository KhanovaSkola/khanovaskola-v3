<?php

namespace App\Models\Rme;

use App\Models\Orm\Mappers;
use Orm\DibiManyToManyMapper;
use Orm\IRepository;


class BlocksMapper extends Mappers\ElasticSearchMapper
{

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
	 * @return NULL|Content
	 */
	public function getNextContent(User $user, Block $block)
	{
		$row = $this->connection->query('
			SELECT [cbb.content_id]
			FROM [content_block_bridges] [cbb]
			LEFT JOIN [completed_contents] [cc] ON (
				[cc.content_id] = [cbb.content_id]
				AND [cc.user_id] = ?', $user->id, '
			)
			WHERE [cbb.block_id] = ?', $block->id, '
				AND [cc.id] IS NULL
			ORDER BY [cbb.position] ASC
			LIMIT 1
		')->fetch();

		if (!$row)
		{
			return NULL;
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
				'min_score' => 18,
				'query' => [
					'multi_match' => [
						'query' => $query,
						'fields' => ['title', 'description'],
					],
				]
			]
		];

		return $this->elastic->search($args);
	}

}
