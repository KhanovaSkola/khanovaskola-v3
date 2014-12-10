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

		if ($this->schema)
		{
			$this['schemaForm-form-title']->setDefaultValue($this->schema->name);
			$this['schemaForm-form-description']->setDefaultValue($this->schema->description);
			$this['schemaForm-form-subject']->setDefaultValue($this->schema->subject->id);

			$layout = $this->schema->layout;
			unset($layout[1]); // remove spacer columns
			unset($layout[3]);
			$this->template->layout = $layout;
		}
		else
		{
			$this->template->layout = $this->getDefaultLayout();
		}
	}

	public function handleUpdateSchema($layout)
	{
		$parsed = Json::decode($layout);

		if (!$this->schema)
		{
			$this->schema = new Rme\Schema();
			$this->schema->name = 'Random new schema';
			$this->orm->schemas->attach($this->schema);
		}

		$this->schema->layout = $parsed;
		$this->orm->flush();

		// TODO enqueue update positions
		// TODO enqueue update relations

		$this->sendJson(['status' => 'ok']);
	}

	/**
	 * @return NULL|Rme\Schema
	 */
	public function getSchema()
	{
		return $this->schema;
	}

	protected function getDefaultLayout()
	{
		$layout = [];
		for ($col = 0; $col < 3; $col++)
		{
			$partial = [];
			for ($row = 0; $row < 20; $row++)
			{
				$partial[] = NULL;
				$partial[] = [];
			}
			$layout[] = $partial;
		}
		return $layout;
	}

}
