<?php

namespace App\Models\Services;

use App\Models\Orm\RepositoryContainer;
use App\Models\Rme\User;
use App\Models\Structs\LazyEntity;
use Nette;
use Nette\Security;
use Nette\Security\IAuthenticator;
use Nette\Security\IAuthorizator;
use Nette\Security\IUserStorage;


class UserState extends Security\User
{

	/**
	 * @var Acl
	 */
	protected $acl;

	/**
	 * @var RepositoryContainer
	 */
	protected $orm;

	public function __construct(IUserStorage $storage, IAuthenticator $authenticator = NULL, IAuthorizator $authorizator = NULL,
	                            Acl $acl, RepositoryContainer $orm)
	{
		parent::__construct($storage, $authenticator, $authorizator);
		$this->acl = $acl;
		$this->orm = $orm;
	}

	/**
	 * @throws \Exception from persist
	 * @return User|LazyEntity
	 */
	public function getUserEntity()
	{
		$userEntity = $this->orm->users->getById($this->id);

		if (!$this->isEphemeralGuest() && !$userEntity)
		{
			// user was deleted from database
			$this->logout(TRUE);
		}

		if (!$userEntity)
		{
			$storage = $this->storage;

			$userEntity = new LazyEntity(function() use ($storage) {
				$user = new User();
				$user->registered = FALSE;

				$this->orm->users->persist($user);

				$storage->setIdentity(new Nette\Security\Identity($user->id));
				return $user;
			});

			$storage->setAuthenticated(FALSE);
		}

		return $userEntity;
	}

	public function isAllowed($resource = IAuthorizator::ALL, $privilege = IAuthorizator::ALL)
	{
		$user = $this->getUserEntity();
		if ($user instanceof LazyEntity)
		{
			return FALSE;
		}
		return $this->acl->isAllowed($user, $resource, $privilege);
	}

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
	}

}
