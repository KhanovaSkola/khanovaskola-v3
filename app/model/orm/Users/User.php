<?php

namespace App\Model;
use Nette\Security\Passwords;
use Nette\DateTime;
use Orm;


/**
 * @property string $name
 * @property string $password
 * @property string $email
 * @property DateTime $createdAt {default now}
 */
class User extends Entity
{

	public function setPlainPassword($plaintext)
	{
		$this->setValue('password', Passwords::hash($plaintext));
	}

}
