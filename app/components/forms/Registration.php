<?php

namespace App\Components\Forms;

use App\InvalidStateException;
use App\Models\Orm\RepositoryContainer;
use App\Models\Rme\User;
use App\Models\Services\Aes;
use App\Models\Structs\Gender;
use App\Presenters\Auth;
use Nette\Security\Identity;
use Nette\Security\Passwords;


class Registration extends Form
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
		$this->addText('email')
			->addRule($this::FILLED, 'email.missing')
			->addRule($this::EMAIL, 'email.wrong');

		$this->addText('name')
			->addRule($this::FILLED, 'name.missing');

		$this->addRadioList('gender', NULL, Gender::getGenders())
			->addRule($this::FILLED, 'gender.missing')
			->setDefaultValue(Gender::MALE);

		$this->addText('password')
			->addRule($this::FILLED, 'password.missing');

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

		$user = $this->orm->users->getByEmail($v->email);
		if ($user && $user->registered)
		{
			$this->addError('duplicate');
			return;
		}
		if (!$user)
		{
			$user = new User;
			$user->email = $v->email;
			$this->orm->users->attach($user);
		}
		$user->gender = $v->gender;
		$user->setNames($v->name);
		$user->registered = TRUE;
		$plainHash = Passwords::hash($v->password);
		$user->password = $this->aes->encrypt($plainHash);

		$this->orm->flush();

		/** @var Auth $presenter */
		$presenter = $this->presenter;
		$presenter->user->login(new Identity($user->id));
		$presenter->onLogin($user, TRUE);
	}
}
