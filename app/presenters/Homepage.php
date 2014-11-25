<?php

namespace App\Presenters;

use App\Models\Rme;


final class Homepage extends Presenter
{

	public function renderDefault()
	{
		$this->setCacheControlPublic();
	}

}
