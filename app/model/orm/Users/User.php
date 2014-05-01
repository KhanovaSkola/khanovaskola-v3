<?php

namespace App\Model;

use App\InvalidStateException;

use Nette\Security\Passwords;
use Orm;


/**
 * @property string $name
 * @property string $familyName
 * @property string $nominative
 * @property string $vocative
 * @property string $gender {enum self::getGenders()}
 * @property string|NULL $password
 * @property string $email
 * @property string|NULL $facebookId
 * @property string|NULL $facebookAccessToken
 * @property string|NULL $googleId
 * @property string|NULL $googleAccessToken
 *
 * @property Orm\OneToMany $badges {1:m badgeUserBridges $user}
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

	public function setNominativeAndVocative($name)
	{
		if (!$this->gender)
		{
			throw new InvalidStateException;
		}

		/** @var UsersRepository $repo */
		$repo = $this->getRepository();

		$this->setValue('nominative', $name);
		$this->setValue('vocative', $repo->getVocative($name, $this->gender));
	}

	public function setPlainPassword($plaintext)
	{
		$this->setValue('password', Passwords::hash($plaintext));
	}

	public function getBadges($key = NULL)
	{
		if ($key === NULL)
		{
			return $this->getValue('badges');
		}
		$id = $this->model->badges->getByKey($key)->id;

		return $this->getValue('badges')->get()->findBy(['badgeId' => $id]);
	}

}
