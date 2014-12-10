<?php

namespace App\Models\Services;

use App\Models\Orm\Entity;
use App\Models\Rme\User;


class Acl
{

	const ALL = 'all';

	/**
	 * @param User $user
	 * @param mixed|Entity $resource
	 * @param NULL|string $privilege
	 * @return bool
	 */
	public function isAllowed(User $user, $resource, $privilege = self::ALL)
	{
		if (in_array($user->privileges, self::ALL))
		{
			return TRUE;
		}

		return FALSE;
	}

}
