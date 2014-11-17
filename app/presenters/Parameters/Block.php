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

	protected function loadBlock(callable $fallback = NULL)
	{
		/** @var Presenter $this */
		$this->block = $this->orm->blocks->getById($this->blockId);
		if (!$this->block)
		{
			if (!$fallback)
			{
				$this->error();
			}
			$this->block = $fallback();
		}
	}

}
