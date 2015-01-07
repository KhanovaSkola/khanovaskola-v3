<?php

namespace App\Models\Rme;

use App\Models\Orm\Mappers\Mapper;


class CompletedContentsMapper extends Mapper
{

	/**
	 * @param User $user
	 * @return Schema[]
	 */
	public function getLatestSchemas(User $user)
	{
		$schemas = [];

		/** @var CompletedContent $completed */
		foreach ($this->findBy(['user_id' => $user->id])->orderBy('createdAt', 'DESC') as $completed)
		{
			$schema = $completed->schema;
			if ($schema && !isset($schemas[(string) $schema->id]))
			{
				$schemas[(string) $schema->id] = $schema;
			}
		}

		return $schemas;
	}

	/**
	 * @param User $user
	 * @param Schema $schema
	 * @return float 0..100
	 */
	public function getCompletedPercent(User $user, Schema $schema)
	{
		return $this->connection->query('
			SELECT Least(100, 100 * (
				SELECT Count(*)
				FROM [completed_contents] [cc]
				WHERE [cc.schema_id] = ?', $schema->id, '
					AND [cc.user_id] = ?', $user->id, '
			)::float
			/
			(
				SELECT Count(*) + 1
				FROM [block_schema_bridges] [bss]
				LEFT JOIN [content_block_bridges] [cbb]
					ON [cbb.block_id] = [bss.block_id]
				WHERE [bss.schema_id] = ?', $schema->id, '
			)::float)
		')->fetchSingle();
	}

}
