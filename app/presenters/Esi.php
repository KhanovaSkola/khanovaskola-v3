<?php

namespace App\Presenters;

use Tracy\Debugger;


class Esi extends Presenter
{

	public function startup()
	{
		parent::startup();
		Debugger::$productionMode = TRUE;
	}

}
