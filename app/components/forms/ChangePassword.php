<?php

namespace App\Components\Forms;

use App\InvalidStateException;
use App\Models\Orm\RepositoryContainer;
use App\Models\Services\Aes;
use App\Models\Services\UserState;
use App\Presenters\Auth;
use Nette\Security\Passwords;


class ChangePassword extends Form
{

	/**
	 * @var RepositoryContainer
	 * @inject
	 */
	public $orm;

	/**
	 * @var UserState
	 * @inject
	 */
	public $userState;

	/**
	 * @var Aes
	 * @inject
	 */
	public $aes;

	public function setup()
	{
		$user = $this->userState->getUserEntity();
		$this->addText('password')
			->addRule($this::FILLED, 'password.missing');
		$this->addHidden('name')->setDefaultValue($user->name)->setDisabled();
		$this->addHidden('email')->setDefaultValue($user->email)->setDisabled();
		$this->addSubmit();
	}

	protected function attached($presenter)
	{
		parent::attached($presenter);

		if (! $this->presenter instanceof Auth)
		{
			throw new InvalidStateException;
		}
	}

	public function onSuccess()
	{
		$v = $this->values;

		/** @var Auth $presenter */
		$presenter = $this->presenter;

		$user = $presenter->userEntity;

		$plainHash = Passwords::hash($v->password);
		$user->password = $this->aes->encrypt($plainHash);

		$this->orm->flush();

		$presenter->flashSuccess('auth.changePassword.success');
		$presenter->redirect('Profile:');
	}
}
