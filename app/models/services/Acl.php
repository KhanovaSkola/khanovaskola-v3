<?php

namespace App\Models\Services;

use App\Models\Orm\Entity;
use App\Models\Rme\User;
use Nette\Security\IAuthorizator;


class Acl
{

	/**
	 * @param User $user
	 * @param mixed|Entity $resource
	 * @param NULL|string $privilege
	 * @return bool
	 */
	public function isAllowed(User $user, $resource, $privilege = IAuthorizator::ALL)
	{

	}

}
