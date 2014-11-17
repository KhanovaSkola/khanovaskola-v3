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
		$this->loadSchema();
		$this->loadBlock();
		$this->loadVideo();

		if (!$this->schema->contains($this->block) || !$this->block->contains($this->video))
		{
			$this->error();
		}
	}

	public function renderDefault()
	{
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
