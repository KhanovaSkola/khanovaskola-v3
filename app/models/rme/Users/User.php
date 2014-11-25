<?php

namespace App\Models\Rme;

use App\InvalidStateException;
use App\Models\Orm\Entity;
use Nette\Security\Passwords;
use Nette\Utils\Strings;
use Orm;
use Orm\OneToMany as OtM;


/**
 * @property bool                  $registered             {default true}
 *
 * NOT NULL if user is registered:
 * @property NULL|string           $email                  also not NULL if created for student invite
 * @property NULL|string           $name
 * @property NULL|string           $familyName
 * @property NULL|string           $nominative
 * @property NULL|string           $vocative
 * @property NULL|string           $gender                 {enum App\Models\Structs\Gender::getGenders()}
 * @property NULL|string           $avatar                 absolute url
 *
 * MIGHT BE NULL even if user is registered:
 * @property NULL|string           $password               aes encrypted bcrypt
 * @property NULL|string           $facebookId
 * @property NULL|string           $facebookAccessToken
 * @property NULL|string           $googleId
 * @property NULL|string           $googleAccessToken
 *
 * Relations:
 * @property OtM|Answer[]          $answers                {1:m answers $user}
 * @property OtM|BadgeUserBridge[] $badges                 {1:m badgeUserBridges $user}
 * @property OtM|Block[]           $blocksAuthored         {1:m blocks $author}
 * @property OtM|Comment[]         $comments               {1:m comments $author}
 * @property OtM|Path[]            $paths                  {1:m paths $author}
 * @property OtM|Schema[]          $schemasAuthored        {1:m schemas $author}
 * @property OtM|StudentInvite[]   $studentInvitesSent     {1:m studentInvites $sender}
 * @property OtM|StudentInvite[]   $studentInvitesReceived {1:m studentInvites $student}
 * @property OtM|Token[]           $tokens                 {1:m tokens $user}
 * @property OtM|VideoView[]       $videosViewed           {1:m videoViews $user}
 */
class User extends Entity
{

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

	/**
	 * @param Content $content
	 * @return bool
	 */
	public function hasCompleted(Content $content)
	{
		return TRUE;
	}

}
