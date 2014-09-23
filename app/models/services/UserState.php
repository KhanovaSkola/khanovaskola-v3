<?php

namespace App\Models\Services;

use App\DeprecatedException;
use Nette\Security;


class UserState extends Security\User
{

	/**
	 * @return bool
	 */
	public function isEphemeralGuest()
	{
		return !$this->getId();
	}

	/**
	 * @return bool
	 */
	public function isPersistedGuest()
	{
		return $this->getId() && !$this->storage->isAuthenticated();
	}

	/**
	 * @return bool
	 */
	public function isRegisteredUser()
	{
		return $this->storage->isAuthenticated();
	}

	/**
	 * @deprecated
	 */
	public function isLoggedIn()
	{
		return !$this->isEphemeralGuest();
		// throw new DeprecatedException;
	}

}
