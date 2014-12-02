<?php

namespace App\Models\Rme;

use App\Models\Orm\Mappers\ElasticSearchMapper;
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
	 * @return DibiCollection|Blueprint[]
	 */
	public function findAllBlueprints()
	{
		return $this->findBy(['type' => 'blueprint']);
	}

	public function getJsonFields()
	{
		return ['vars', 'hints'];
	}

	public function getShortEntityName()
	{
		return 'content';
	}

	public function getVideoById($id)
	{
		return $this->getBy(['type' => 'video', 'id' => $id]);
	}

	public function getBlueprintById($id)
	{
		return $this->getBy(['type' => 'blueprint', 'id' => $id]);
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

}
