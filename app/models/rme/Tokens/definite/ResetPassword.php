<?php

namespace App\Models\Rme\Tokens;

use App\Models\Rme\Token;
use App\Presenters;


class ResetPassword extends Token
{

	public function invoke(Presenters\Token $presenter)
	{
		$presenter->login($this->user);
		$session = $presenter->session->getSection('auth');
		$session->twoStepVerification = TRUE; // email
		$presenter->redirect('Auth:changePassword');
	}

}
