<?php

namespace App\Models\Rme;

use App\Models\Orm\Mappers\Mapper;


class UserAliasesMapper extends Mapper
{

	public function getByEmail($email)
	{
		return $this->getBy(['email' => $email]);
	}

}
