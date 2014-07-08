<?php

namespace App\Models\Rme;

use App;
use App\Models\Orm\Entity;


/**
 * @property App\Models\Rme\User $sender {m:1 users $studentInvitesSent}
 * @property NULL|App\Models\Rme\User $student {m:1 users $studentInvitesReceived}
 * @property string $email original recipient
 * @property bool $accepted {default false}
 */
class StudentInvite extends Entity
{

	/**
	 * @param User $teacher
	 * @param User|string $recipient entity or email
	 */
	public function __construct(User $teacher, $recipient)
	{
		parent::__construct();
		$this->sender = $teacher;

		if ($recipient instanceof User)
		{
			$this->student = $recipient;
			$this->email = $recipient->email;
		}
		else
		{
			$this->email = $recipient;
		}
	}

}
