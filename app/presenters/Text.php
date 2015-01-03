<?php

namespace App\Presenters;


class Text extends Presenter
{

	public function renderAbout()
	{
		$this->setCacheControlPublic('1h');
	}

}
