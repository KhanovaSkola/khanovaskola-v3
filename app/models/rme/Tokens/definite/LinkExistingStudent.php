<?php

namespace App\Models\Rme\Tokens;

use App\Models\Orm\RepositoryContainer;
use App\Models\Rme\StudentInvite;
use App\Models\Rme\Token;
use App\Presenters;


/**
 * @property StudentInvite $studentInvite {m:1 studentInvites}
 */
class LinkExistingStudent extends Token
{

	public function invoke(Presenters\Token $presenter, RepositoryContainer $orm)
	{
		$presenter->login($this->user);

		$this->studentInvite->setAccepted();
		$orm->flush();
		$presenter->flashSuccess('student.approveMentor');

		$presenter->redirect('Profile:');
	}

}
