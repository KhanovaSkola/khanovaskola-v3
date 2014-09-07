<?php

namespace App\Components\Forms;

use App\InvalidStateException;
use App\Models\Orm\RepositoryContainer;
use App\Models\Rme\User;
use App\Models\Services\Aes;
use App\Presenters\Auth;
use Nette\Security\Identity;
use Nette\Security\Passwords;


class ChangePassword extends Form
{

	/**
	 * @var RepositoryContainer
	 * @inject
	 */
	public $orm;

	/**
	 * @var Aes
	 * @inject
	 */
	public $aes;

	public function setup()
	{
		$this->addText('password')
			->addRule($this::FILLED);

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
