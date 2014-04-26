<?php

namespace App\Model;

use Nette\DateTime;
use Nette\Security\Passwords;
use Orm;


/**
 * @property string $name
 * @property string $firstName
 * @property string $lastName
 * @property string $gender {enum self::getGenders()}
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

	const GENDER_MALE = 'male';
	const GENDER_FEMALE = 'female';

	/**
	 * @return array
	 */
	public static function getGenders()
	{
		return [
			self::GENDER_MALE => self::GENDER_MALE,
			self::GENDER_FEMALE => self::GENDER_FEMALE,
		];
	}

	public function setPlainPassword($plaintext)
	{
		$this->setValue('password', Passwords::hash($plaintext));
	}

}
