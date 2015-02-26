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

	/**
	 * @return Rme\Schema
	 */
	public function getSchema()
	{
		return $this->schema;
	}

	protected function loadSchema(callable $fallback = NULL)
	{
		/** @var Presenter $this */
		if ($this->schemaId && !ctype_digit("$this->schemaId"))
		{
			$this->error();
		}

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
