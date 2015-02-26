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

	/**
	 * @return Rme\Block
	 */
	public function getBlock()
	{
		return $this->block;
	}

	protected function loadBlock(callable $fallback = NULL)
	{
		/** @var Presenter $this */
		if ($this->blockId && !ctype_digit("$this->blockId"))
		{
			$this->error();
		}

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
