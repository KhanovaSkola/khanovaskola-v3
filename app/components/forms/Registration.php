<?php

namespace App\Components\Forms;

use App\InvalidStateException;
use App\Models\Orm\RepositoryContainer;
use App\Models\Rme\User;
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

	public function setup()
	{
		$this->addText('email')
			->addRule($this::FILLED)
			->addRule($this::EMAIL);

		$this->addText('name')
			->addRule($this::FILLED);

		$this->addRadioList('gender', NULL, [
			User::GENDER_MALE => User::GENDER_MALE,
			User::GENDER_FEMALE => User::GENDER_FEMALE,
		])
			->addRule($this::FILLED)
			->setDefaultValue(User::GENDER_MALE);

		$this->addText('password')
			->addRule($this::FILLED);
		// TODO min length / other rules
		// TODO forbid top 10 000 passwords

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
		if (!$user)
		{
			$user = new User;
			$user->email = $v->email;
			$this->orm->users->attach($user);
		}
		$user->gender = $v->gender;
		$user->setNames($v->name);
		$user->registered = TRUE;
		$user->password = Passwords::hash($v->password);

		$this->orm->flush();

		/** @var Auth $presenter */
		$presenter = $this->presenter;
		$presenter->user->login(new Identity($user->id));
		$presenter->onLogin($user, TRUE);
	}
}
