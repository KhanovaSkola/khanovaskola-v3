<?php

namespace App\Presenters;

use App\Models\Rme;
use App\Models\Structs\LazyEntity;
use App\Presenters\Parameters;


class Block extends Presenter
{

	use Parameters\Block;
	use Parameters\Schema;
	use Parameters\Slug;

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
			$this->redirectToEntity($this->block);
		}

		$this->checkSlug($this->block);
	}

	public function renderDefault()
	{
		$this->template->add('block', $this->block);
		$this->template->add('schema', $this->schema);
	}

	public function actionContinue()
	{
		$user = $this->userEntity;
		if (! $user instanceof LazyEntity)
		{
			$next = $this->orm->blocks->getNextContent($user, $this->block);
			if ($next)
			{
				$this->redirectToEntity($next, $this->block, $this->schema);
			}
		}

		$this->redirectToEntity($this->block->getFirstContent(), $this->block, $this->schema);
	}

}
