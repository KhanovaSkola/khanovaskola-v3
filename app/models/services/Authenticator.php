<?php

namespace App\Models\Services;

use App\Models\Orm\RepositoryContainer;
use Nette;
use Nette\Security\AuthenticationException;
use Nette\Security\Identity;
use Nette\Security\Passwords;


class Authenticator extends Nette\Object implements Nette\Security\IAuthenticator
{

	const PASSWORD_NOT_SET = 5;

	/**
	 * @var Aes
	 */
	private $aes;

	/**
	 * @var RepositoryContainer
	 */
	private $orm;

	public function __construct(RepositoryContainer $orm, Aes $aes)
	{
		$this->aes = $aes;
		$this->orm = $orm;
	}

	/**
	 * @param array $credentials
	 * @return Identity
	 * @throws AuthenticationException
	 */
	public function authenticate(array $credentials)
	{
		list($email, $password) = $credentials;
		$user = $this->orm->users->getByEmail($email);

		if (!$user)
		{
			throw new AuthenticationException('auth.flash.wrongUsername', self::IDENTITY_NOT_FOUND);
		}
		if (!$user->password)
		{
			throw new AuthenticationException('auth.flash.notSet', self::PASSWORD_NOT_SET);
		}

		$plainHash = $this->aes->decrypt($user->password);
		if (strpos($user->password, 'old-password;') === 0)
		{
			$this->authOldPassword($password, $user);
		}
		else if (!Passwords::verify($password, $plainHash))
		{
			throw new AuthenticationException('auth.flash.wrongPassword', self::INVALID_CREDENTIAL);
		}
		if (Passwords::needsRehash($plainHash))
		{
			$plainHash = Passwords::hash($password);
			$user->password = $this->aes->encrypt($plainHash);
			$this->orm->flush();
		}

		return new Identity($user->id);
	}

	/**
	 * @deprecated
	 * @param string $password
	 * @param $user
	 * @throws AuthenticationException
	 */
	private function authOldPassword($password, $user)
	{
		list($_, $hash, $salt) = explode(';', $user->password);
		if ($this->calculateHash($password, $salt) !== $hash)
		{
			throw new AuthenticationException('auth.flash.wrongPassword', self::INVALID_CREDENTIAL);
		}

		$plainHash = Passwords::hash($password);
		$user->password = $this->aes->encrypt($plainHash);
		$this->orm->flush();
	}

	/**
	 * @deprecated
	 * @param string $password
	 * @param string $salt
	 * @param int $depth
	 * @return string
	 */
	private function calculateHash($password, $salt, $depth = 100)
	{
		if ($depth === 0)
		{
			return md5("$salt.$password.$salt");
		}

		return md5($this->calculateHash($password, $salt, $depth - 1));
	}

}
