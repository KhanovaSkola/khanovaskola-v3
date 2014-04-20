<?php

namespace App\Presenters;

use App\Model\Event;
use App\Model\Gist;
use App\Model\User;
use App\Tasks\SendMail;
use App\Tasks\SendMailTask;
use Kdyby\Events\EventArgsList;
use Nette\Application\UI\Form;
use Nette\Utils\Strings;


final class HomepagePresenter extends BasePresenter
{

	public function actionDefault()
	{
		// $task = new SendMailTask('test', 'mikulas@khanovaskola.cz', ['foo' => 'bar']);
		// $this->context->getService('queue')->enqueue($task);

		$gist = $this->orm->gists->getByName('test');
		$this['gist']->setEditable(TRUE);
		$this['gist']->setGist($gist);

		// $this->eventManager->dispatchEvent('onVideoWatched', new EventArgsList([
		//	$this
		// ]));
		// dump($this->eventManager);
	}

}
