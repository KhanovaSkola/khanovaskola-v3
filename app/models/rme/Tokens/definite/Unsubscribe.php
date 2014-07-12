<?php

namespace App\Models\Rme\Tokens;

use App\Models\Orm\RepositoryContainer;
use App\Models\Rme;
use App\Models\Rme\Token;
use App\Presenters;


/**
 * @property string $emailType view name
 */
class Unsubscribe extends Token
{

	public function invoke(Presenters\Token $presenter, RepositoryContainer $orm)
	{
		$us = new Rme\Unsubscribe($this->user->email, $this->emailType);
		$orm->unsubscribes->attach($us);
		$orm->flush();

		$presenter->flashSuccess('unsubscribe');
		$presenter->redirect('Homepage:');
	}

}
