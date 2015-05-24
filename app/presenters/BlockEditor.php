<?php

namespace App\Presenters;

use App\Components\Controls\EditorSelector;
use App\Models\Rme;
use App\Models\Services\Acl;
use App\Presenters\Parameters;
use Nette\Forms\Controls\TextInput;


class BlockEditor extends Presenter
{

	use Parameters\Block;
	use Parameters\Schema;

	public function startup()
	{
		parent::startup();

		$this->loadBlock(function() {
			return NULL;
		});
		$this->loadSchema(function() {
			return NULL;
		});

		if ($this->block && $this->schema && !$this->schema->contains($this->block))
		{
			$this->error();
		}

		if (!($this->user->isAllowed(Acl::ADD_BLOCK) || ($this->block && $this->user->isAllowed($this->block))))
		{
			$this->flashError('acl.denied.block');
			$this->redirect('Homepage:default');
		}
	}

	public function actionDefault()
	{
		/** @var TextInput[]|EditorSelector[] $form */
		$form = $this['blockForm-form'];
		if ($this->block)
		{
			$form['title']->setDefaultValue($this->block->title);
			$form['description']->setDefaultValue($this->block->description);
			$form['visible']->setDefaultValue(!$this->block->hidden);

			$allowed = $this->block->author->id === $this->userEntity->id;
			foreach ($this->block->schemas as $schema)
			{
				if ($allowed)
				{
					break;
				}
				$allowed = $this->user->isAllowed($schema);
			}
			$form['editors']->setEditable($allowed);
			$form['editors']->setDefaultValue($this->block->editors->get()->fetchAll());
			$form['editors']->setEntity($this->block);
		}
		else
		{
			$form['editors']->setEditable(TRUE);
		}
	}

	public function renderDefault()
	{
		$this->template->add('block', $this->block);
		$this->template->add('schema', $this->schema);
	}

}
