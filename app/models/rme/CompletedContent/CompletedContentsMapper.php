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
			if ($schema && !isset($schemas[$schema->id]))
			{
				$schemas[$schema->id] = $schema;
			}
		}

		return $schemas;
	}

}
