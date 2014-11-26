<?php

namespace App\Models\Rme;

use App\Models\Orm\Mappers;


class BlocksMapper extends Mappers\Mapper
{

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

}
