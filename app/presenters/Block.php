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
    if ($this->block->kaUrl) {
      $this->redirectUrl($this->block->kaUrl, 301);
    }
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
                // Total video seconds in block
                //$this->template->add('block_duration',$this->block->duration);
                $this->template->add('block_duration_hours',$this->template->getLatte()->invokeFilter('hours',[$this->block->duration]));
                $this->template->add('block_duration_minutes',$this->template->getLatte()->invokeFilter('minutes',[$this->block->duration]));

		$this->template->continueTo = NULL;
		if (!$this->user->isEphemeralGuest())
		{
			$this->template->continueTo = $this->getContinueToContent();
		}
	}

	public function getContinueToContent()
	{
		$user = $this->userEntity;
		if (! $user instanceof LazyEntity)
		{
			$next = $this->orm->blocks->getNextContent($user, $this->block);
			if ($next === FALSE)
			{
				return FALSE;
			}
			else if ($next !== NULL)
			{
				return [$next, $this->block, $this->schema];
			}
		}

		return NULL;
	}

	public function actionContinue()
	{
		$list = $this->getContinueToContent();
		if (!$list)
		{
			$list = [$this->block->getFirstContent(), $this->block, $this->schema];
		}

		list($content, $block, $schema) = $list;
		$this->redirectToEntity($content, $block, $schema);
	}

}
