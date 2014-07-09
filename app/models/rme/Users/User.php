<?php

namespace App\Models\Rme;

use App\InvalidStateException;
use App\Models\Orm\Entity;
use Nette\Security\Passwords;
use Nette\Utils\Strings;
use Orm;


/**
 * @property bool $registered {default true}
 *
 * NOT NULL if user is registered:
 * @property NULL|string $email also not NULL if created for student invite
 * @property NULL|string $name
 * @property NULL|string $familyName
 * @property NULL|string $nominative
 * @property NULL|string $vocative
 * @property NULL|string $gender {enum self::getGenders()}
 *
 * MIGHT BE NULL even if user is registered:
 * @property NULL|string $password
 * @property NULL|string $facebookId
 * @property NULL|string $facebookAccessToken
 * @property NULL|string $googleId
 * @property NULL|string $googleAccessToken
 *
 * @property Orm\OneToMany $answers {1:m answers $user}
 * @property Orm\OneToMany $badges {1:m badgeUserBridges $user}
 * @property Orm\OneToMany $comments {1:m comments $author}
 * @property Orm\OneToMany $paths {1:m paths $author}
 * @property Orm\OneToMany $studentInvitesSent {1:m studentInvites $sender}
 * @property Orm\OneToMany $studentInvitesReceived {1:m studentInvites $student}
 * @property Orm\OneToMany $tokens {1:m tokens $user}
 * @property Orm\OneToMany $videosViewed {1:m videoViews $user}
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
		$this->setValue('vocative', $repo->getVocative($name, $this->gender) ?: $name);
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

	public function setEmail($email)
	{
		/**
		 * Not according to RFC 5321, but as per SO this is ok
		 * @see http://stackoverflow.com/a/9808332/326257
		 */
		$this->setValue('email', Strings::lower($email));
	}

	/**
	 * @param $fullName
	 */
	public function setNames($fullName)
	{
		$this->name = $fullName;

		$parts = preg_split('~\s+~', $fullName);
		if ($parts)
		{
			$this->setNominativeAndVocative($parts[0]);
			array_shift($parts);

			$this->familyName = implode(' ', $parts);
		}
	}

}
