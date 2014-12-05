<?php

namespace App\Presenters;

use App\Models\Rme;
use App\Models\Structs\EventList;


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
	}

	/**
	 * test method
	 * @deprecated
	 */
	public function handleGetBadge()
	{
		$video = $this->orm->contents->getById(3);
		$this->trigger(EventList::VIDEO_WATCHED, [$this->userEntity, $video]);
		$this->orm->flush();
		$this->redirect('this');
	}

}
