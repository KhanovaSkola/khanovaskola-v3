<?php

namespace App\Presenters;

use App\Model\Event;
use App\Model\Gist;
use App\Model\User;
use Kdyby\Events\EventArgsList;
use Nette\Application\UI\Form;
use Nette\Utils\Strings;


final class TestPresenter extends BasePresenter
{

	public function actionDefault()
	{
		$this->flashSuccess('Nicely done.', 'That action you made us do went down jsut fine.');
		$this->flashInfo('Just so you know…', 'While it worked, an inconsitency was found and fixed automatically.');
		$this->flashError('Oh snap!', 'Database went away and I will fix it straight away.');
	}

}
