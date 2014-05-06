<?php

namespace App\Presenters;

use App\Rme\Exercise;


class ExercisePresenter extends BasePresenter
{

	/**
	 * @var int
	 * @persistent
	 */
	public $exerciseId;

	/** @var Exercise */
	protected $exercise;

	public function startup()
	{
		parent::startup();

		if (!$this->exercise = $this->orm->exercises->getById($this->exercise))
		{
			$this->error();
		}
	}

	public function renderDefault()
	{
		$this->template->exercise = $this->exercise;
	}

}
