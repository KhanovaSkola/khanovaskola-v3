<?php

namespace App\Models\Services;

use App\Models\Rme\UsersRepository;
use Nette;
use Nette\Security\AuthenticationException;
use Nette\Security\Identity;
use Nette\Security\Passwords;


class Authenticator extends Nette\Object implements Nette\Security\IAuthenticator
{

	const PASSWORD_NOT_SET = 5;

	/** @var UsersRepository */
	protected $users;

	public function __construct(UsersRepository $users)
	{
		$this->users = $users;
	}

	/**
	 * @param array $credentials
	 * @return Identity
	 * @throws AuthenticationException
	 */
	public function authenticate(array $credentials)
	{
		list($email, $password) = $credentials;
		$user = $this->users->getByEmail($email);

		if (!$user)
		{
			throw new AuthenticationException('auth.flash.password.wrongUsername', self::IDENTITY_NOT_FOUND);
		}
		else if (!$user->password)
		{
			throw new AuthenticationException('auth.flash.password.notSet', self::PASSWORD_NOT_SET);
		}
		else if (!Passwords::verify($password, $user->password))
		{
			throw new AuthenticationException('auth.flash.password.wrongPassword', self::INVALID_CREDENTIAL);
		}
		else if (Passwords::needsRehash($user->password))
		{
			$user->password = Passwords::hash($password);
			$this->users->flush();
		}

		return new Identity($user->id);
	}

}
