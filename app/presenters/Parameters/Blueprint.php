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

	protected function loadBlueprint(callable $fallback = NULL)
	{
		/** @var Presenter $this */
		$this->blueprint = $this->orm->contents->getById($this->blueprintId);
		if (!$this->blueprint || ! $this->blueprint instanceof Rme\Blueprint)
		{
			if (!$fallback)
			{
				$this->error();
			}
			$this->blueprint = $fallback();
		}
	}

}
