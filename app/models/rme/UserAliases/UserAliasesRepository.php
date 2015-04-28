<?php

namespace App\Models\Rme;

use App\Models\Orm\Repository;
use Orm\DibiCollection;


/**
 * @method DibiCollection|UserAlias[] findAll()
 * @method UserAlias getByEmail($email)
 */
class UserAliasesRepository extends Repository
{

	public function getEntityClassName(array $data = NULL)
	{
		return UserAlias::class;
	}

}
