<?php

namespace App\Models\Rme;

use App;
use App\Models\Orm\Entity;
use Nette\Security\Passwords;
use Nette\Utils\DateTime;
use Nette\Utils\Random;
use Serializable;


/**
 * @property NULL|App\Models\Rme\User $user {m:1 users $tokens}
 * @property string $type {enum self::getTypes}
 * @property string $hash bcrypt of unsafe hash
 * @property bool $used {default false}
 */
class Token extends Entity
{

	const TYPE_LOGIN = 'login';
	const TYPE_STUDENT_INVITE = 'student-invite';

	protected $unsafe;


	/**
	 * @param string $str as serialized by static::toString()
	 * @param TokensRepository $tokens
	 * @return NULL|static
	 */
	public static function createFromString($str, TokensRepository $tokens)
	{
		$json = base64_decode($str, TRUE);
		$data = json_decode($json, TRUE);
		if (!$json || !$data)
		{
			throw new TokenNotValidException;
		}

		return $tokens->getById($data['id']);
	}

	/**
	 * @param string $type
	 * @param User $user
	 * @return static
	 */
	public static function createFromUser($type, User $user)
	{
		$token = new static;

		$token->type = $type;
		$token->user = $user;

		$token->unsafe = $token->computeUnsafeHash();
		$token->hash = Passwords::hash($token->unsafe);

		return $token;
	}

	/**
	 * @return string Password grade hash (do not store!)
	 */
	protected function computeUnsafeHash()
	{
		if ($this->hash)
		{
			throw new App\InvalidStateException('Hash already set');
		}
		if (!$this->user)
		{
			throw new App\InvalidArgumentException;
		}

		return md5($this->createdAt->format('u') . $this->user->email) . Random::generate(15);
	}

	/**
	 * Not available when loaded from storage
	 * @return string
	 */
	public function getUnsafe()
	{
		return $this->unsafe;
	}

	public function validate($unsafe)
	{
		if ($this->createdAt < DateTime::from('- 3 days'))
		{
			throw new TokenExpiredException;
		}

		if ($this->used)
		{
			throw new TokenAlreadyUsedException;
		}

		if (!Passwords::verify($unsafe, $this->hash))
		{
			throw new TokenNotValidException;
		}
	}

	public function setUsed($used = TRUE)
	{
		$this->used = $used;
	}

	public function toString()
	{
		return base64_encode(json_encode([
			'id' => $this->id,
			'hash' => $this->hash,
		]));
	}

}
