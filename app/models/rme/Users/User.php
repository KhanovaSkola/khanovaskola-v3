<?php

namespace App\Models\Rme;

use App\InvalidStateException;
use App\Models\Orm\Entity;
use Nette\Security\Passwords;
use Nette\Utils\Strings;
use Orm;


/**
 * @property bool              $registered             {default true}
 *
 * NOT NULL if user is registered:
 * @property NULL|string       $email                  also not NULL if created for student invite
 * @property NULL|string       $name
 * @property NULL|string       $familyName
 * @property NULL|string       $nominative
 * @property NULL|string       $vocative
 * @property NULL|string       $gender                 {enum self::getGenders()}
 *
 * MIGHT BE NULL even if user is registered:
 * @property NULL|string       $password
 * @property NULL|string       $facebookId
 * @property NULL|string       $facebookAccessToken
 * @property NULL|string       $googleId
 * @property NULL|string       $googleAccessToken
 *
 * Relations:
 * @property Answer[]          $answers                {1:m answers $user}
 * @property BadgeUserBridge[] $badges                 {1:m badgeUserBridges $user}
 * @property Comment[]         $comments               {1:m comments $author}
 * @property Path[]            $paths                  {1:m paths $author}
 * @property StudentInvite[]   $studentInvitesSent     {1:m studentInvites $sender}
 * @property StudentInvite[]   $studentInvitesReceived {1:m studentInvites $student}
 * @property Token[]           $tokens                 {1:m tokens $user}
 * @property VideoView[]       $videosViewed           {1:m videoViews $user}
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
