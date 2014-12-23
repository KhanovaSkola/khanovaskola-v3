<?php

namespace App\Presenters;

use App\Components\Controls\Comments;
use App\Models\Rme;
use App\Presenters\Parameters;
use Nette\Utils\Strings;


final class Video extends Content
{

	use Parameters\Block;
	use Parameters\Schema;
	use Parameters\Slug;
	use Parameters\Video;

	public function startup()
	{
		parent::startup();
		$this->loadVideo();
		$this->loadBlock(function() {
			$block = $this->video->getRandomParent();
			if ($block)
			{
				$this->redirectToEntity($this->video, $block);
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
				$this->redirectToEntity($this->video, $this->block, $schema);
			}
		});

		if ($this->block && !$this->block->contains($this->video))
		{
			$this->error();
		}
		if ($this->block && $this->schema && !$this->schema->contains($this->block))
		{
			$this->error();
		}

		$this->checkSlug($this->video);
	}

	public function renderDefault()
	{
		$this->setCacheControlPublic();

		list($nextContent, $nextBlock, $nextSchema) = $this->orm->contents->getNext($this->video, $this->block, $this->schema);

		$this->template->video = $this->video;
		$this->template->block = $this->block;
		$this->template->schema = $this->schema;
		$this->template->nextContent = $nextContent;
		$this->template->nextBlock = $nextBlock;
		$this->template->nextSchema = $nextSchema;
		$this->template->suggestions = $this->getSuggestions($this->video);
		$this->template->position = $this->block ? $this->block->getPositionOf($this->video) : NULL;
	}

	public function createComponentComments()
	{
		return $this->buildComponent(Comments::class, [$this->video]);
	}

}
