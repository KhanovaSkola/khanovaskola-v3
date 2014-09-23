<?php

namespace App\Components\Forms;

use App\InvalidStateException;
use App\Models\Orm\RepositoryContainer;
use App\Models\Services\Aes;
use App\Models\Services\Entropy;
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
	 * @var Aes
	 * @inject
	 */
	public $aes;

	/**
	 * @var Entropy
	 * @inject
	 */
	public $entropy;

	public function setup()
	{
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

		/** @var Auth $presenter */
		$presenter = $this->presenter;

		$user = $presenter->userEntity;

		$plainHash = Passwords::hash($v->password);
		$user->password = $this->aes->encrypt($plainHash);

		$this->orm->flush();

		$this->iLog('form.changePassword', [
			'entropy' => $this->entropy->compute($v->password, $user),
		]);

		$presenter->flashSuccess('auth.changePassword.success');
		$presenter->redirect('Profile:');
	}
}
