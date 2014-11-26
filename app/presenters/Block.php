<?php

namespace App\Presenters;

use App\Models\Rme;
use App\Presenters\Parameters;


class Block extends Presenter
{

	use Parameters\Block;
	use Parameters\Schema;

	public function startup()
	{
		parent::startup();

		$this->loadBlock();
		$this->loadSchema(function() {
			$schema = $this->block->getRandomParent();
			if ($schema)
			{
				$this->redirectToEntity($this->block, $schema);
			}
		});

		if ($this->schema && !$this->schema->contains($this->block))
		{
			$this->error();
		}
	}

	public function renderDefault()
	{
		$this->setCacheControlPublic();

		$this->template->add('block', $this->block);
		$this->template->add('schema', $this->schema);
	}

	public function actionContinue()
	{
		// TODO optimize
		foreach ($this->block->contents as $content)
		{
			if (!$this->userEntity->hasCompleted($content))
			{
				$this->redirectToEntity($content, $this->block, $this->schema);
			}
		}

		$this->redirectToEntity($this->block->getFirstContent(), $this->block, $this->schema);
	}

}
