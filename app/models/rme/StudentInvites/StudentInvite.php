<?php

namespace App\Models\Rme;

use App;
use App\Models\Orm\Entity;


/**
 * @property App\Models\Rme\User $sender {m:1 users $studentInvitesSent}
 * @property App\Models\Rme\User $student {m:1 users $studentInvitesReceived}
 * @property bool $accepted {default false}
 */
class StudentInvite extends Entity
{

	/**
	 * @param User $teacher
	 * @param User $student
	 */
	public function __construct(User $teacher, $student)
	{
		parent::__construct();
		$this->sender = $teacher;
		$this->student = $student;
	}

	public function setAccepted($accepted = TRUE)
	{
		$this->setValue('accepted', $accepted);
	}

}
