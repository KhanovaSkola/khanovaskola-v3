<?php

namespace App\Presenters;

use App\Components\Controls\Comments;
use App\Models\Rme;
use App\Presenters\Parameters;


final class Video extends Content
{

	use Parameters\Block;
	use Parameters\Schema;
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
	}

	public function renderDefault()
	{
		$this->setCacheControlPublic();

		$this->template->video = $this->video;
		$this->template->block = $this->block;
		$this->template->schema = $this->schema;
		$this->template->suggestions = $this->getSuggestions($this->video);
	}

	public function createComponentComments()
	{
		return $this->buildComponent(Comments::class, [$this->video]);
	}

}
