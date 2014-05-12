<?php

namespace App\Rme;

use App\Orm\Mapper\Mapper;


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
