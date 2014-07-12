<?php

namespace App\Models\Rme;

use App\InvalidArgumentException;
use App\InvalidStateException;
use App\Models\Orm\Entity;
use App\Models\Orm\RepositoryContainer;
use Nette\Security\Passwords;
use Nette\Utils\DateTime;
use Nette\Utils\Random;


/**
 * @property NULL|User $user {m:1 users $tokens}
 * @property string    $type
 * @property string    $hash bcrypt of unsafe hash
 * @property bool      $used {default false}
 */
abstract class Token extends Entity
{

	protected $unsafe;


	/**
	 * @param string $str as serialized by static::toString()
	 * @param RepositoryContainer $orm
	 * @return NULL|Token
	 */
	public static function createFromString($str, RepositoryContainer $orm)
	{
		$json = base64_decode($str, TRUE);
		$data = json_decode($json, TRUE);
		if (!$json || !$data)
		{
			throw new TokenNotValidException;
		}

		/** @var Token $token */
		$token = $orm->tokens->getById($data['id']);
		$token->unsafe = $data['unsafe'];

		return $token;
	}

	/**
	 * @param User $user
	 * @return static
	 */
	public static function createFromUser(User $user)
	{
		$token = new static;

		$ref = new \ReflectionClass($token);
		$token->type = $ref->getShortName();
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
		if ($this->getValue('hash', FALSE))
		{
			throw new InvalidStateException('Hash already set');
		}
		if (!$this->user)
		{
			throw new InvalidArgumentException;
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

	public function validate()
	{
		if ($this->createdAt < DateTime::from('- 3 days'))
		{
			throw new TokenExpiredException;
		}

		if ($this->used)
		{
			throw new TokenAlreadyUsedException;
		}

		if (!Passwords::verify($this->unsafe, $this->hash))
		{
			throw new TokenNotValidException;
		}
	}

	public function setUsed($used = TRUE)
	{
		$this->setValue('used', $used);
	}

	public function toString($unsafe)
	{
		return base64_encode(json_encode([
			'id' => $this->id,
			'unsafe' => $unsafe,
		]));
	}

}
