<?php

namespace App\Presenters;

use App\Models\Rme;
use App\Models\Structs\LazyEntity;
use App\Presenters\Parameters;


class Schema extends Presenter
{

	use Parameters\Schema;

	private $_preloadedBlocks = [];

	public function startup()
	{
		parent::startup();
		$this->loadSchema();
	}

	public function renderDefault()
	{
		$this->setCacheControlPublic();

		$this->template->schema = $this->schema;

		$this->template->getBlock = function($id) {
			if (!$this->_preloadedBlocks)
			{
				$b = iterator_to_array($this->schema->blocks);
				foreach ($b as $block)
				{
					$this->_preloadedBlocks[$block->id] = $block;
				}
			}
			return isset($this->_preloadedBlocks[$id])
				? $this->_preloadedBlocks[$id]
				: $this->orm->blocks->getById($id);
		};
	}

	/**
	 * Redirects user to the first content he has not completed yet
	 */
	public function actionContinue()
	{
		$user = $this->userEntity;
		if (! $user instanceof LazyEntity)
		{
			$next = $this->orm->schemas->getNextContent($user, $this->schema);
			if ($next)
			{
				list($content, $block) = $next;
				$this->redirectToEntity($content, $block, $this->schema);
			}
		}

		$block = $this->schema->getFirstBlock();
		$this->redirectToEntity($block->getFirstContent(), $block, $this->schema);
	}

}
