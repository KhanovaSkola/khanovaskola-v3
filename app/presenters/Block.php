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

		if (!$this->schema->contains($this->block))
		{
			$this->error();
		}
	}

	public function renderDefault()
	{
		$this->template->add('block', $this->block);
		$this->template->add('schema', $this->schema);
	}

}
