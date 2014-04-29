<?php

namespace App\Presenters;

use App\Model\User;


final class ProfilePresenter extends BasePresenter
{

	/**
	 * @persistent
	 * @var int self::ME
	 */
	public $userId;

	/** @var User */
	protected $profile;

	public function startup()
	{
		parent::startup();

		if (!$this->userId)
		{
			if ($this->user->loggedIn)
			{
				$this->profile = $this->userEntity;
			}
			else
			{
				$this->redirectToAuth();
			}
		}
		else if (! $this->profile = $this->orm->users->getById($this->userId))
		{
			$this->error();
		}
	}

	public function renderDefault()
	{
		$this->template->profile = $this->profile;
	}

}
