<?php

namespace App\Presenters;

use App\Presenters\Parameters;


class SchemaEditor extends Presenter
{

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
		$this->template->blocks = $this->orm->blocks->findAll()->orderBy('name', 'ASC');
	}

}
