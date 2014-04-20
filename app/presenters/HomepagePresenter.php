<?php

namespace App\Presenters;

use App\Model\Event;
use App\Model\Gist;
use App\Model\User;
use Kdyby\Events\EventArgsList;
use Nette\Application\UI\Form;
use Nette\Utils\Strings;


final class HomepagePresenter extends BasePresenter
{

	public function actionDefault()
	{
		$gist = $this->orm->gists->getByName('test');
		$this['gist']->setGist($gist);

		// $this->eventManager->dispatchEvent('onVideoWatched', new EventArgsList([
		//	$this
		// ]));
		// dump($this->eventManager);
	}

}
