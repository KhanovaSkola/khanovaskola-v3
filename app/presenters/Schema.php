<?php

namespace App\Presenters;

use App\Models\Rme;
use App\Presenters\Parameters;


class Schema extends Presenter
{

	use Parameters\Schema;

	public function startup()
	{
		parent::startup();
		$this->loadSchema();
	}

	public function renderDefault()
	{
		$this->setCacheControlPublic();

		$this->template->add('schema', $this->schema);
	}

	/**
	 * Redirects user to the first content he has not completed yet
	 */
	public function actionContinue()
	{
		// TODO optimize
		foreach ($this->schema->blocks as $block)
		{
			foreach ($block->contents as $content)
			{
				if (!$this->userEntity->hasCompleted($content))
				{
					$this->redirectUrl($this->link($content));
				}
			}
		}

		$block = $this->schema->getFirstBlock();
		$this->redirectToEntity($block->getFirstContent(), $block, $this->schema);
	}

}
