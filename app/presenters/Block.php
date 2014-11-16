<?php

namespace App\Presenters;

use App\Models\Rme;


class Block extends Presenter
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

	public function startup()
	{
		parent::startup();

		$this->block = $this->orm->blocks->getById($this->blockId);
		if (!$this->block)
		{
			$this->error();
		}
	}

	public function renderDefault()
	{
		$this->template->add('block', $this->block);
	}

}
