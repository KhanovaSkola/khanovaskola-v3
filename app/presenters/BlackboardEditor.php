<?php

namespace App\Presenters;

use App\Models\Rme;
use App\Models\Services\Acl;
use App\Presenters\Parameters;
use Nette\Forms\Controls\TextInput;


final class BlackboardEditor extends Content
{

	use Parameters\Blackboard;
	use Parameters\Block;
	use Parameters\Schema;

	public function startup()
	{
		parent::startup();
		$this->loadBlackboard(function() {
			return NULL;
		});
		$this->loadBlock(function() {
			return NULL;
		});
		$this->loadSchema(function() {
			return NULL;
		});

		if ($this->blackboard && $this->block && !$this->block->contains($this->blackboard))
		{
			$this->error();
		}
		if ($this->block && $this->schema && !$this->schema->contains($this->block))
		{
			$this->error();
		}

		if (!($this->user->isAllowed(Acl::ADD_CONTENT) || ($this->blackboard && $this->user->isAllowed($this->blackboard))))
		{
			$this->flashError('acl.denied.blackboard');
			$this->redirect('Homepage:default');
		}
	}

	public function renderDefault()
	{
		$this->template->blackboard = $this->blackboard;
		$this->template->block = $this->block;
		$this->template->schema = $this->schema;

		if ($this->blackboard)
		{
			/** @var self|TextInput[] $this */
//			$this['videoForm-form-title']->setDefaultValue($this->video->title);
//			$this['videoForm-form-description']->setDefaultValue($this->video->description);
//			$this['videoForm-form-youtubeId']->setDefaultValue($this->video->youtubeId);
//			$this['videoForm-form-visible']->setDefaultValue(!$this->video->hidden);
		}
	}

}
