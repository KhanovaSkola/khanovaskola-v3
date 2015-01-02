<?php

namespace App\Components\Forms;


use App\Models\Orm\RepositoryContainer;
use App\Models\Rme\Unsubscribe;
use App\Models\Services\UserState;


class Profile extends Form
{

	/**
	 * @var UserState
	 * @inject
	 */
	public $user;

	/**
	 * @var RepositoryContainer
	 * @inject
	 */
	public $orm;

	public function setup()
	{
		$this->addText('name')
			->setRequired('name.missing');
		$this->addCheckbox('subscribe');

		$this->addSubmit();
	}

	public function onSuccess()
	{
		$v = $this->values;
		$user = $this->user->getUserEntity();

		$user->setNames($v->name);

		$unsubscribe = $this->orm->unsubscribes->getByEmail($user->email);
		if ($v->subscribe)
		{
			if ($unsubscribe)
			{
				$this->orm->unsubscribes->remove($unsubscribe);
			}
		}
		else if (!$unsubscribe)
		{
			$unsubscribe = new Unsubscribe($user->email, 'manual-settings');
			$this->orm->unsubscribes->attach($unsubscribe);
		}

		$this->orm->flush();
		$this->presenter->flashSuccess('profileForm.success');
		$this->presenter->redirect('this');
	}

}
