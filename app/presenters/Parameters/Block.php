<?php

namespace App\Presenters\Parameters;

use App\Models\Rme;
use App\Presenters\Presenter;


trait Block
{

	/**
	 * @var int
	 * @persistent
	 */
	public $blockId;

	/**
	 * @var Rme\Block
	 */
	protected $block;

	protected function loadBlock()
	{
		/** @var Presenter $this */
		$this->block = $this->orm->blocks->getById($this->blockId);
		if (!$this->block)
		{
			$this->error();
		}
	}

}
