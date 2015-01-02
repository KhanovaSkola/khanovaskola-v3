<?php

namespace App\Presenters;

use App\Components\Controls\EditorSelector;
use App\Models\Rme;
use App\Models\Services\Acl;
use App\Models\Services\SchemaLayout;
use App\Presenters\Parameters;
use Nette\Forms\Controls\TextInput;


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

		$this->loadSchema(function() {
			return NULL;
		});

		if (!($this->user->isAllowed(Acl::ADD_SCHEMA) || ($this->schema && $this->user->isAllowed($this->schema))))
		{
			$this->flashError('acl.denied.schema');
			$this->redirect('Homepage:default');
		}
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
			/** @var self|TextInput[]|EditorSelector[] $this */
			$this['schemaForm-form-title']->setDefaultValue($this->schema->title);
			$this['schemaForm-form-description']->setDefaultValue($this->schema->description);
			$this['schemaForm-form-editors']->setEditable($this->user->isAllowed($this->schema));
			$this['schemaForm-form-editors']->setDefaultValue($this->schema->editors->get()->fetchPairs('id', 'id'));

			$layout = $this->schema->layout;
			unset($layout[1]); // remove spacer columns
			unset($layout[3]);
			$this->template->layout = $layout;
		}
		else
		{
			$this->template->layout = $this->schemaLayout->getDefaultLayout();
			$this['schemaForm-form-editors']->setEditable(TRUE);
		}
	}

}
