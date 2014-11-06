<?php

namespace App\Presenters;


final class Subjects extends Presenter
{

	public function renderDefault()
	{
		$this->template->subjects = $this->orm->subjects->findAll();
	}

}
