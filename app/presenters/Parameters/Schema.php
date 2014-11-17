<?php

namespace App\Presenters\Parameters;

use App\Models\Rme;
use App\Presenters\Presenter;


trait Schema
{

	/**
	 * @var int
	 * @persistent
	 */
	public $schemaId;

	/**
	 * @var Rme\Schema
	 */
	protected $schema;

	protected function loadSchema(callable $fallback = NULL)
	{
		/** @var Presenter $this */
		$this->schema = $this->orm->schemas->getById($this->schemaId);
		if (!$this->schema)
		{
			if (!$fallback)
			{
				$this->error();
			}
			$this->schema = $fallback();
		}
	}

}
