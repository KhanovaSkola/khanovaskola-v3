<?php

namespace App\Models\Rme;

use App\Models\Orm\Mappers\Mapper;


class SchemasMapper extends Mapper
{

	public function findAll()
	{
		return parent::findAll()->orderBy('position', 'ASC');
	}

	public function getJsonFields()
	{
		return ['layout'];
	}

	/**
	 * Find latest watched and return first next unwatched
	 *
	 * @param User $user
	 * @param Schema $schema
	 * @return NULL|array [Content, Block]
	 */
	public function getNextContent(User $user, Schema $schema)
	{
		$watched = $this->connection->query('
			SELECT [bsb.position] [block_position], [cbb.position] [content_position], [cbb.content_id]
			FROM [completed_contents] [cc]
			LEFT JOIN [content_block_bridges] [cbb] ON (
				[cbb.content_id] = [cc.content_id] AND [cc.block_id] = [cbb.block_id]
			)
			LEFT JOIN [block_schema_bridges] [bsb] ON [bsb.block_id] = [cbb.block_id]
			WHERE [cc.user_id] = ?', $user->id, '
				AND [cc.schema_id] = ?', $schema->id, '
			ORDER BY [cc.created_at] DESC
		')->fetchAll();

		if (!$watched)
		{
			return NULL;
		}

		$ignore = [];
		$latest = NULL;
		foreach ($watched as $row)
		{
			if ($latest === NULL)
			{
				$latest = $row;
			}
			$ignore[] = $row['content_id'];
		}

		$next = $this->connection->query('
			SELECT [cbb.block_id], [cbb.content_id]
			FROM [content_block_bridges] [cbb]
			LEFT JOIN [block_schema_bridges] [bsb]
				ON [cbb.block_id] = [bsb.block_id]
			WHERE [bsb.schema_id] = ?', $schema->id, '
				AND (
				(
					[bsb.position] = ?', $latest['block_position'], '
					AND [cbb.position] > ?', $latest['content_position'], '
				)
				OR
				(
					[bsb.position] > ?', $latest['block_position'], '
				)
			) AND [cbb.content_id] NOT IN (?)', $ignore, '
			ORDER BY [bsb.position] ASC, [cbb.position] ASC
		')->fetch();

		if ($next === NULL)
		{
			return NULL;
		}

		return [
			$this->model->contents->getById($next['content_id']),
			$this->model->blocks->getById($next['block_id']),
		];
	}

}
