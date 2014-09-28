<?php

namespace App\Presenters;

use App\Models\Rme;


final class Homepage extends Presenter
{

	public function actionDefault()
	{
		$this->template->add('subjects', $this->orm->subjects->findAll());
	}

}
