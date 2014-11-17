<?php

namespace App\Presenters;

use App\Models\Rme;
use App\Presenters\Parameters;


class Block extends Presenter
{

	use Parameters\Block;
	use Parameters\Schema;

	public function startup()
	{
		parent::startup();

		$this->loadBlock();
		$this->loadSchema();
	}

	public function renderDefault()
	{
		$this->template->add('block', $this->block);
	}

}
