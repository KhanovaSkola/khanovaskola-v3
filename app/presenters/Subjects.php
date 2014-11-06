<?php

namespace App\Presenters;


final class Subjects extends Presenter
{

	public function renderDefault()
	{
		$this->template->add('subjects', $this->orm->subjects->findAll());
	}

}
