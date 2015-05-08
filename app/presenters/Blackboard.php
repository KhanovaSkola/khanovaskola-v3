<?php

namespace App\Presenters;


class Blackboard extends Presenter
{

	use Parameters\Blackboard;
	use Parameters\Block;
	use Parameters\Schema;
	use Parameters\Slug;

	/**
	 * @var int
	 * @persistent
	 */
	public $startAtTime = 0;

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
		list($nextContent, $nextBlock, $nextSchema) = $this->orm->contents->getNext($this->blackboard, $this->block, $this->schema);

		$id = $this->blackboardId;
		$this->template->dataFile = "/data/blackboard/$id.json";
		$this->template->blackboard = $this->blackboard;
		$this->template->block = $this->block;
		$this->template->schema = $this->schema;
		$this->template->nextContent = $nextContent;
		$this->template->nextBlock = $nextBlock;
		$this->template->nextSchema = $nextSchema;
		$this->template->position = $this->block ? $this->block->getPositionOf($this->blackboard) : NULL;
		$this->template->startAtTime = $this->startAtTime;
	}

}
