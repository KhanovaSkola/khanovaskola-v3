<?php

namespace App\Models\Rme;

use App\Models\Orm\Entity;
use App\Models\Structs\Gender;
use Nette\Security\Passwords;
use Nette\Utils\Strings;
use Orm;
use Orm\ManyToMany as MtM;
use Orm\OneToMany as OtM;


/**
 * @property bool                   $registered             {default true}
 * @property-read bool              $unsubscribed           {ignore}
 *
 * NOT NULL if user is registered:
 * @property NULL|string            $email                  also not NULL if created for student invite
 * @property NULL|array             $privileges
 * @property NULL|string            $name                   ex: Jan Novák
 * @property NULL|string            $firstName              ex: Jan
 * @property NULL|string            $familyName             ex: Novák
 * @property NULL|string            $gender                 {enum App\Models\Structs\Gender::getGenders()}
 * @property NULL|string            $avatar                 absolute url
 *
 * MIGHT BE NULL even if user is registered:
 * @property NULL|string            $password               aes encrypted bcrypt
 * @property NULL|string            $facebookId
 * @property NULL|string            $facebookAccessToken    aes encrypted
 * @property NULL|string            $googleId
 * @property NULL|string            $googleAccessToken      aes encrypted
 * @property NULL|int               $oldId                  for discourse sso
 *
 * Relations:
 * @property OtM|Answer[]           $answers                {1:m answers $user}
 * @property OtM|BadgeUserBridge[]  $badges                 {1:m badgeUserBridges $user}
 * @property OtM|Block[]            $blocksAuthored         {1:m blocks $author}
 * @property OtM|Comment[]          $comments               {1:m comments $author}
 * @property OtM|CompletedBlock[]   $completedBlocks        {1:m completedBlocks $user}
 * @property OtM|CompletedContent[] $completedContents      {1:m completedContents $user}
 * @property OtM|Schema[]           $schemasAuthored        {1:m schemas $author}
 * @property OtM|StudentInvite[]    $studentInvitesSent     {1:m studentInvites $sender}
 * @property OtM|StudentInvite[]    $studentInvitesReceived {1:m studentInvites $student}
 * @property OtM|Token[]            $tokens                 {1:m tokens $user}
 * @property OtM|VideoView[]        $videosViewed           {1:m videoViews $user}
 *
 * @property MtM|Subject[]          $subjectsEdited         {m:m subjects $editors mapped}
 * @property MtM|Schema[]           $schemasEdited          {m:m schemas $editors mapped}
 * @property MtM|Block[]            $blocksEdited           {m:m blocks $editors mapped}
 */
class User extends Entity
{

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
		$this->setValue('email', $email ? Strings::lower($email) : NULL);
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
			$this->firstName = $parts[0];
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
		return $this->completedContents->get()->findBy(['contentId' => $content->id])->count();
	}

	/**
	 * @return NULL|CompletedContent
	 */
	public function getLastCompletedContent()
	{
		return $this->completedContents->get()->orderBy('createdAt', 'DESC')->fetch();
	}

	/**
	 * @return array
	 */
	public function getPrivileges()
	{
		$o = $this->getValue('privileges');
		return $o ?: [];
	}

	/**
	 * @return bool
	 */
	public function hasCacheBurstingPrivileges()
	{
		return count($this->getPrivileges())
			|| $this->subjectsEdited->count()
			|| $this->schemasEdited->count() || $this->schemasAuthored->count()
			|| $this->blocksEdited->count() || $this->blocksAuthored->count();
	}

	/**
	 * @return bool
	 */
	public function isUnsubscribed()
	{
		if (!$this->email)
		{
			return FALSE;
		}
		return (bool) $this->model->unsubscribes->getByEmail($this->email);
	}

	/**
	 * @return string
	 */
	public function getSsoId()
	{
		return $this->oldId ?: "3-{$this->id}";
	}

}
