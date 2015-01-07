<?php

namespace App\Models\Rme\Tokens;

use App\Models\Rme\Token;
use App\Presenters;


class Login extends Token
{

	public function invoke(Presenters\Token $presenter)
	{
		$presenter->login($this->user);
		$presenter->flashSuccess('auth.flash.login.returning', [
			'name' => $this->user->firstName,
		]);
		$presenter->redirect('Profile:');
	}

}
