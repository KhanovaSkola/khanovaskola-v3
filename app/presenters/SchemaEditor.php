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
		if ($this->userEntity->id === 1)
		{
			$this->template->blocks = $this->orm->blocks->findAll()->orderBy('id', 'ASC');
		}
		else
		{
			$this->template->blocks = $this->orm->blocks->findAllButOldWeb()->orderBy('id', 'ASC');
		}
		$this->template->getBlock = function($id) {
			return $this->orm->blocks->getById($id);
		};

		/** @var TextInput[]|EditorSelector[] $form */
		$form = $this['schemaForm-form'];
		if ($this->schema)
		{
			$form['title']->setDefaultValue($this->schema->title);
			$form['description']->setDefaultValue($this->schema->description);
			$form['kaUrl']->setDefaultValue($this->schema->kaUrl);
			$form['visible']->setDefaultValue(!$this->schema->hidden);
			$form['editors']->setEditable(
				$this->schema->author->id === $this->userEntity->id ||
				$this->user->isAllowed($this->schema->subject)
			);
			$form['editors']->setDefaultValue($this->schema->editors->get()->fetchAll());
			$form['editors']->setEntity($this->schema);

			$layout = $this->schema->layout;
			unset($layout[1]); // remove spacer columns
			unset($layout[3]);
			$this->template->layout = $layout;
		}
		else
		{
			$this->template->layout = $this->schemaLayout->getDefaultLayout();
			$form['editors']->setEditable(TRUE);
		}
	}

}
