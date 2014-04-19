<?php


namespace App\Services;

use Kdyby\Events\Subscriber;
use Nette\Object;


class BadgeProvider extends Object implements Subscriber
{

	public function getSubscribedEvents()
	{
		return ['onVideoWatched'];
	}

	public function onVideoWatched(Video $video)
	{

	}

}
