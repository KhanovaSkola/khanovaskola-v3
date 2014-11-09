<?php

namespace App\Presenters;

use App\Models\Rme;


class Schema extends Presenter
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

	public function startup()
	{
		parent::startup();

		$this->schema = $this->orm->schemas->getById($this->schemaId);
		if (!$this->schema)
		{
			$this->error();
		}
	}

	public function renderDefault()
	{
		$this->template->add('schema', $this->schema);
	}

}
