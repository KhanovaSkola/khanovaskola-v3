<?php

namespace App\Presenters;

use Tracy\Debugger;


class File extends Presenter
{

	public function startup()
	{
		parent::startup();
		Debugger::$productionMode = TRUE;
	}

}
