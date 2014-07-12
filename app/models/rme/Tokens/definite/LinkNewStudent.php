<?php

namespace App\Models\Rme\Tokens;

use App\Models\Orm\RepositoryContainer;
use App\Models\Rme\StudentInvite;
use App\Models\Rme\Token;
use App\Presenters;


/**
 * @property StudentInvite $studentInvite {m:1 studentInvites}
 */
class LinkNewStudent extends Token
{

	public function invoke(Presenters\Token $presenter, RepositoryContainer $orm)
	{
		$this->studentInvite->setAccepted();
		$orm->flush();

		$presenter->redirect('Auth:registration', ['email' => $this->user->email]);
	}

}
