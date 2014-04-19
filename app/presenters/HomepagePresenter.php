<?php

namespace App\Presenters;

use App\Model\Event;
use App\Model\User;
use Kdyby\Events\EventArgsList;
use Nette\Application\UI\Form;
use Nette\Utils\Strings;


final class HomepagePresenter extends BasePresenter
{

	public function actionDefault()
	{
		// $this->eventManager->dispatchEvent('onVideoWatched', new EventArgsList([
		//	$this
		// ]));
		// dump($this->eventManager);
	}

}
