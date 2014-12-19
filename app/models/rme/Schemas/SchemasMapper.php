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
	 * @param User $user
	 * @param Schema $schema
	 * @return NULL|array [Content, Block]
	 */
	public function getNextContent(User $user, Schema $schema)
	{
		$row = $this->connection->query('
			SELECT [cbb.block_id], [cbb.content_id]
			FROM [block_schema_bridges] [bsb]
			LEFT JOIN [content_block_bridges] [cbb] ON [cbb.block_id] = [bsb.block_id]
			LEFT JOIN [completed_contents] [cc] ON (
				[cc.content_id] = [cbb.content_id]
				AND [cc.user_id] = ?', $user->id, '
			)
			WHERE [bsb.schema_id] = ?', $schema->id, '
				AND [cc.id] IS NULL
			ORDER BY [bsb.position] ASC, [cbb.position] ASC
			LIMIT 1
		')->fetch();

		if (!$row)
		{
			return NULL;
		}

		return [
			$this->model->contents->getById($row['content_id']),
			$this->model->blocks->getById($row['block_id']),
		];
	}

}
