<?php

namespace App\Models\Rme;

use App\Models\Orm\Mappers\Mapper;


class AnswersMapper extends Mapper
{

	public function findRecentByUserAndBlueprint(User $user, Blueprint $blueprint)
	{
		return $this->findBy([
			'userId' => $user->id,
			'contentId' => $blueprint->id,
			'firstTry' => TRUE,
		])->orderBy('created_at', 'DESC');
	}

}
