<?php

namespace App\Presenters;

use App\Models\Rme;
use App\Presenters\Parameters;
use Nette\Utils\Json;


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
		$this->template->blocks = $this->orm->blocks->findAll()->orderBy('id', 'ASC');
		$this->template->getBlock = function($id) {
			return $this->orm->blocks->getById($id);
		};
	}

	public function handleUpdateSchema($layout)
	{
		$parsed = Json::decode($layout);

		if (!$this->schema)
		{
			$this->schema = new Rme\Schema();
		}

		$this->schema->layout = $parsed;
		$this->orm->flush();

		// TODO enqueue update positions
		// TODO enqueue update relations

		$this->sendJson(['status' => 'ok']);
	}

}
