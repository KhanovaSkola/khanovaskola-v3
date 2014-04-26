<?php

namespace App\Model;

use Nette\DateTime;
use Nette\Security\Passwords;
use Orm;


/**
 * @property string $name
 * @property string|NULL $password
 * @property string $email
 * @property string|NULL $facebookId
 * @property string|NULL $facebookAccessToken
 * @property string|NULL $googleId
 * @property string|NULL $googleAccessToken
 * @property DateTime $createdAt {default now}
 */
class User extends Entity
{

	public function setPlainPassword($plaintext)
	{
		$this->setValue('password', Passwords::hash($plaintext));
	}

}
