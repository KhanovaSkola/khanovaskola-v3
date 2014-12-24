<?php

namespace App\Presenters;

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

		if (!($this->user->isAllowed(Acl::ADD_NEW) || ($this->block && $this->user->isAllowed($this->block))))
		{
			$this->flashError('acl.denied.block');
			$this->redirect('Homepage:default');
		}
	}

	public function renderDefault()
	{
		$this->template->add('block', $this->block);
		$this->template->add('schema', $this->schema);

		if ($this->block)
		{
			/** @var self|TextInput[] $this */
			$this['blockForm-form-title']->setDefaultValue($this->block->title);
			$this['blockForm-form-description']->setDefaultValue($this->block->description);
		}
	}

}
