<?php

namespace App\Presenters;

use App\Models\Rme;
use App\Models\Services\SchemaLayout;
use App\Models\Structs\LazyEntity;
use App\Presenters\Parameters;


class Schema extends Presenter
{

	use Parameters\Schema;
	use Parameters\Slug;

	private $preloadedBlocks = [];

	/**
	 * @var SchemaLayout
	 * @inject
	 */
	public $schemaLayout;

	public function startup()
	{
		parent::startup();
		$this->loadSchema();
		$this->checkSlug($this->schema);
	}

	public function renderDefault()
	{
		$this->template->schema = $this->schema;
		$this->template->layout = $this->schemaLayout->trim($this->schema->layout);

		$this->template->getBlock = function($id) {
			if (!$this->preloadedBlocks)
			{
				$b = iterator_to_array($this->schema->blocks);
				foreach ($b as $block)
				{
					$this->preloadedBlocks[$block->id] = $block;
				}
			}
			return isset($this->preloadedBlocks[$id])
				? $this->preloadedBlocks[$id]
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
