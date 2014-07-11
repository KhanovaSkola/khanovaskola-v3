<?php

namespace App\Models\Services;

use App\Models\Rme\User;
use Kdyby\Facebook\Facebook;
use Kdyby\Facebook\FacebookApiException;
use Nette\Object;


class FacebookPage extends Object
{

	/** @var \Kdyby\Facebook\Facebook */
	private $facebook;

	/** @var string */
	private $pageId;

	public function __construct($pageId, Facebook $facebook)
	{
		$this->facebook = $facebook;
		$this->pageId = $pageId;
	}

	/**
	 * @param User $user
	 * @return bool
	 */
	public function doesUserLikePage(User $user)
	{
		$this->facebook->setAccessToken($user->facebookAccessToken);
		try
		{
			return count($this->facebook->api("me/likes/{$this->pageId}")->data) !== 0;
		}
		catch (FacebookApiException $e)
		{
			return FALSE; // safe fallback
		}
	}

}
