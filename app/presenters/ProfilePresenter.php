<?php

namespace App\Presenters;

use App\Model\EventList;
use App\Model\User;
use Kdyby\Events\EventArgsList;


final class ProfilePresenter extends BasePresenter
{

	/**
	 * @persistent
	 * @var int self::ME
	 */
	public $userId;

	/** @var User */
	protected $profile;

	public function startup()
	{
		parent::startup();

		if (!$this->userId)
		{
			if ($this->user->loggedIn)
			{
				$this->profile = $this->userEntity;
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
	}

	public function handleGetBadge()
	{
		$video = $this->orm->videos->getById(3);
		$this->eventManager->dispatchEvent(EventList::VIDEO_WATCHED, new EventArgsList([
			$video, $this->userEntity
		]));
		$this->orm->flush();
		$this->redirect('this');
	}

}
