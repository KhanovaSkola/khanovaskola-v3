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

	/**
	 * @var UsersRepository
	 */
	protected $users;

	/**
	 * @var Aes
	 */
	private $aes;

	public function __construct(UsersRepository $users, Aes $aes)
	{
		$this->users = $users;
		$this->aes = $aes;
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
			throw new AuthenticationException('auth.flash.wrongUsername', self::IDENTITY_NOT_FOUND);
		}
		if (!$user->password)
		{
			throw new AuthenticationException('auth.flash.notSet', self::PASSWORD_NOT_SET);
		}

		$plainHash = $this->aes->decrypt($user->password);
		if (!Passwords::verify($password, $plainHash))
		{
			throw new AuthenticationException('auth.flash.wrongPassword', self::INVALID_CREDENTIAL);
		}
		if (Passwords::needsRehash($plainHash))
		{
			$plainHash = Passwords::hash($password);
			$user->password = $this->aes->encrypt($plainHash);
			$this->users->flush();
		}

		return new Identity($user->id);
	}

}
