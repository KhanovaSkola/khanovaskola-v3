<?php

namespace App\Services;

use App\Model\UsersRepository;
use Nette;
use Nette\Security\Passwords;


class Authenticator extends Nette\Object implements Nette\Security\IAuthenticator
{

	protected $users;

	public function __construct(UsersRepository $users)
	{
		$this->users = $users;
	}

	/**
	 * @param array $credentials
	 * @return Nette\Security\Identity|Nette\Security\IIdentity
	 * @throws Nette\Security\AuthenticationException
	 */
	public function authenticate(array $credentials)
	{
		list($email, $password) = $credentials;
		$user = $this->users->findByEmail($email)->fetch();

		if (!$user)
		{
			throw new Nette\Security\AuthenticationException('The username is incorrect.', self::IDENTITY_NOT_FOUND);
		}
		else if (!Passwords::verify($password, $user->password))
		{
			throw new Nette\Security\AuthenticationException('The password is incorrect.', self::INVALID_CREDENTIAL);
		}
		else if (Passwords::needsRehash($user->password))
		{
			$user->password = Passwords::hash($password);
			$this->users->flush(); // TODO test
		}

		return new Nette\Security\Identity($user->id);
	}

}
