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
		$this->flashSuccess('test.flash.success');
		$this->flashInfo('test.flash.info');
		$this->flashError('test.flash.error');
	}

}
