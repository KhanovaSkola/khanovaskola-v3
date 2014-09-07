<?php

namespace App\Models\Rme\Tokens;

use App\Models\Rme\Token;
use App\Presenters;


class ResetPassword extends Token
{

	public function invoke(Presenters\Token $presenter)
	{
		$presenter->login($this->user);
		$presenter->redirect('Auth:changePassword');
	}

}
