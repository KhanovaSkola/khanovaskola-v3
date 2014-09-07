<?php

namespace App\Models\Rme;

use App\Models\Orm\Repository;
use App\Models\Rme\Tokens\LinkExistingStudent;
use App\Models\Rme\Tokens\LinkNewStudent;
use App\Models\Rme\Tokens\Login;
use App\Models\Rme\Tokens\ResetPassword;
use App\Models\Rme\Tokens\Unsubscribe;
use App\NotImplementedException;


/**
 * @method Token getByEmail(string $email)
 */
class TokensRepository extends Repository
{

	public function getEntityClassName(array $data = NULL)
	{
		if ($data === NULL)
		{
			return self::getTypes();
		}

		if (isset($data['type']))
		{
			return "App\\Models\\Rme\\Tokens\\$data[type]";
		}

		throw new NotImplementedException;
	}

	public static function getTypes()
	{
		return [
			LinkExistingStudent::class,
			LinkNewStudent::class,
			Login::class,
			ResetPassword::class,
			Unsubscribe::class,
		];
	}

}
