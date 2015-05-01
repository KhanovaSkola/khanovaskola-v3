<?php

namespace App\Presenters;

use App\Models\Services\Acl;


class Blackboard extends Presenter
{

	public function actionRecorder()
	{
		if (! $this->user->isAllowed(Acl::ADD_CONTENT))
		{
			$this->flashError('acl.denied.blackboard');
			$this->redirect('Homepage:default');
		}
	}

}
