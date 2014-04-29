<?php

namespace App\Presenters;

use App\Model\User;


final class ProfilePresenter extends BasePresenter
{

	const ME = 'me';

	/**
	 * @persistent
	 * @var int|string self::ME
	 */
	public $userId;

	/** @var User */
	protected $profile;

	public function startup()
	{
		if ($this->userId === self::ME)
		{
			if ($this->user->loggedIn)
			{
				$this->profile = $this->userEntity;
			}
			else
			{
				$this->redirect('Auth:'); // TODO refactor with backlink
			}
		}
		else if (! $this->profile = $this->orm->users->getById($this->userId))
		{
			$this->error();
		}

		parent::startup();
	}

	public function renderDefault()
	{
		$this->template->profile = $this->profile;
	}

}
