<?php

namespace App\Presenters\Parameters;

use App\Models\Rme;
use App\Presenters\Presenter;


trait Blueprint
{

	/**
	 * @var int
	 * @persistent
	 */
	public $blueprintId;

	/**
	 * @var Rme\Blueprint
	 */
	protected $blueprint;

	protected function loadBlueprint()
	{
		/** @var Presenter $this */
		$this->blueprint = $this->orm->contents->getById($this->blueprintId);
		if (!$this->blueprint || ! $this->blueprint instanceof Rme\Blueprint)
		{
			$this->error();
		}
	}

}
