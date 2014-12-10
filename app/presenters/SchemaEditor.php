<?php

namespace App\Presenters;

use App\Models\Rme;
use App\Models\Services\SchemaLayout;
use App\Presenters\Parameters;


class SchemaEditor extends Presenter
{

	/**
	 * @var SchemaLayout
	 * @inject
	 */
	public $schemaLayout;

	use Parameters\Schema;

	public function startup()
	{
		parent::startup();

		// TODO limit access to editor users

		$this->loadSchema(function() {
			return NULL;
		});
	}

	public function actionDefault()
	{
		$this->template->schema = $this->schema;
		$this->template->blocks = $this->orm->blocks->findAll()->orderBy('id', 'ASC');
		$this->template->getBlock = function($id) {
			return $this->orm->blocks->getById($id);
		};

		if ($this->schema)
		{
			$this['schemaForm-form-title']->setDefaultValue($this->schema->title);
			$this['schemaForm-form-description']->setDefaultValue($this->schema->description);
			$this['schemaForm-form-subject']->setDefaultValue($this->schema->subject->id);

			$layout = $this->schema->layout;
			unset($layout[1]); // remove spacer columns
			unset($layout[3]);
			$this->template->layout = $layout;
		}
		else
		{
			$this->template->layout = $this->schemaLayout->getDefaultLayout();
		}
	}

	/**
	 * @return NULL|Rme\Schema
	 */
	public function getSchema()
	{
		return $this->schema;
	}

}
