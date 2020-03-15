<?php

namespace App\Models\Services;

use App\Models\Rme\User;
use App\Models\Structs\LazyEntity;

/**
 * Single Sign On
 * @see https://meta.discourse.org/t/official-single-sign-on-for-discourse/13045
 */
class DiscourseSso extends Sso
{

	/**
	 * @var Discourse
	 */
	private $discourse;

	public function __construct($secret, $redirect, Discourse $discourse)
	{
		parent::__construct($secret, $redirect);
		$this->discourse = $discourse;
	}

	/**
	 * @param User|LazyEntity $user
	 */
	public function onLogin($user)
	{
		$username = $this->discourse->getUsername($user->email);
		if ($username !== NULL)
		{
			$user->discourseUsername = $username;
		}
	}

}
