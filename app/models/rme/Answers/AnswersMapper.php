<?php

namespace App\Models\Rme;

use App\Models\Orm\Mappers\Mapper;


class AnswersMapper extends Mapper
{

	public function findRecentByUserAndBlueprint(User $user, Blueprint $blueprint)
	{
		return $this->findBy([
			'userId' => $user->id,
			'blueprintId' => $blueprint->id,
		])->orderBy('created_at', 'DESC');
	}

}
