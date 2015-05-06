<?php

namespace App\Presenters\Parameters;

use App\Models\Rme;
use App\Presenters\Presenter;


trait Blackboard
{

	/**
	 * @var int
	 * @persistent
	 */
	public $blackboardId;

	/**
	 * @var Rme\Blackboard
	 */
	protected $blackboard;

	/**
	 * @return Rme\Blackboard
	 */
	public function getBlackboard()
	{
		return $this->blackboard;
	}

	protected function loadBlackboard(callable $fallback = NULL)
	{
		/** @var Presenter $this */
		if ($this->blackboardId && !ctype_digit("$this->blackboardId"))
		{
			$this->error();
		}

		$this->blackboard = $this->orm->contents->getById($this->blackboardId);
		if (!$this->blackboard)
		{
			if (!$fallback)
			{
				$this->error();
			}
			$this->blackboard = $fallback();
		}
	}

}
