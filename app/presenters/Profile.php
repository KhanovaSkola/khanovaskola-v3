<?php

namespace App\Presenters;

use App\Components\Forms;
use App\Models\Rme;
use Nette\Forms\Controls\BaseControl;


final class Profile extends Presenter
{

	/**
	 * @persistent
	 * @var int self::ME
	 */
	public $userId;

	/**
	 * @var Rme\User
	 */
	protected $profile;

	public function startup()
	{
		parent::startup();

		if (!$this->userId)
		{
			if ($this->user->isRegisteredUser())
			{
				$this->profile = $this->userEntity;
			}
			else if ($this->user->isPersistedGuest())
			{
				$this->redirectToRegistration();
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

		$lastSchemas = $this->orm->completedContents->getLatestSchemas($this->userEntity);
		$lastSchema = array_shift($lastSchemas);
		$this->template->lastSchema = $lastSchema;
		$this->template->lastSchemas = $lastSchemas;

		if (!$lastSchema)
		{
			$this->redirect('Homepage:default');
		}
	}

	public function renderSettings()
	{
		/** @var Forms\Profile|BaseControl[] $form */
		$form = $this['profileForm-form'];
		$form['name']->setDefaultValue($this->userEntity->name);
		$form['subscribe']->setDefaultValue(!$this->userEntity->unsubscribed);
	}

}
