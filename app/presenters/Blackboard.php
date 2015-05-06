<?php

namespace App\Presenters;

use App\Models\Services\Acl;
use App\Models\Services\Paths;


class Blackboard extends Presenter
{

	use Parameters\Blackboard;
	use Parameters\Block;
	use Parameters\Schema;
	use Parameters\Slug;

	/**
	 * @var Paths
	 * @inject
	 */
	public $paths;

	public function startup()
	{
		parent::startup();

		$this->loadBlackboard();
		$this->loadBlock(function() {
			$block = $this->blackboard->getRandomParent();
			if ($block)
			{
				$this->redirectToEntity($this->blackboard, $block);
			}
		});
		$this->loadSchema(function() {
			if (!$this->block)
			{
				return NULL;
			}

			$schema = $this->block->getRandomParent();
			if ($schema)
			{
				$this->redirectToEntity($this->blackboard, $this->block, $schema);
			}
		});

		if ($this->block && !$this->block->contains($this->blackboard))
		{
			$this->redirectToEntity($this->blackboard);
		}
		if ($this->block && $this->schema && !$this->schema->contains($this->block))
		{
			$this->redirectToEntity($this->blackboard);
		}

		$this->checkSlug($this->blackboard);
	}

	public function renderDefault()
	{
		$id = $this->blackboardId;
		$this->template->dataFile = "/data/blackboard/$id.json";
	}

	public function actionRecorder()
	{
		if (! $this->user->isAllowed(Acl::ADD_CONTENT))
		{
			$this->flashError('acl.denied.blackboard');
			$this->redirect('Homepage:default');
		}
	}

}
