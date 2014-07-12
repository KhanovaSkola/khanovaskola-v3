<?php

namespace App\Components\Forms;

use App\InvalidStateException;
use App\Models\Orm\RepositoryContainer;
use App\Presenters\Auth;
use Nette\Security\AuthenticationException;


class Login extends Form
{

	/**
	 * @var RepositoryContainer
	 * @inject
	 */
	public $orm;

	public function setup()
	{
		$this->addText('email')
			->addRule($this::FILLED)
			->addRule($this::EMAIL);

		$this->addPassword('password')
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
		$v = $this->getValues();

		/** @var Auth $presenter */
		$presenter = $this->presenter;
		try
		{
			$userEntity = $this->orm->users->getByEmail($v->email);
			if ($userEntity && !$userEntity->registered)
			{
				$presenter->redirect('Auth:registration', ['email' => $v->email]);
			}

			$presenter->user->login($v->email, $v->password);
			$presenter->onLogin($userEntity);
		}
		catch (AuthenticationException $e)
		{
			$presenter->flashError($e->getMessage());
		}
	}
}
