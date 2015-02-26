<?php

namespace App\Presenters\Parameters;

use App\Models\Rme;
use App\Presenters\Presenter;


trait Subject
{

	/**
	 * @var int
	 * @persistent
	 */
	public $subjectId;

	/**
	 * @var Rme\Subject
	 */
	protected $subject;

	/**
	 * @return Rme\Subject
	 */
	public function getSubject()
	{
		return $this->subject;
	}

	protected function loadSubject(callable $fallback = NULL)
	{
		/** @var Presenter $this */
		if ($this->subjectId && !ctype_digit("$this->subjectId"))
		{
			$this->error();
		}

		$this->subject = $this->orm->subjects->getById($this->subjectId);
		if (!$this->subject)
		{
			if (!$fallback)
			{
				$this->error();
			}
			$this->subject = $fallback();
		}
	}

}
