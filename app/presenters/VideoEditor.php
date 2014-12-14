<?php

namespace App\Presenters;

use App\Models\Rme;
use App\Presenters\Parameters;
use Nette\Forms\Controls\TextInput;


final class VideoEditor extends Content
{

	use Parameters\Block;
	use Parameters\Schema;
	use Parameters\Video;

	public function startup()
	{
		parent::startup();
		$this->loadVideo(function() {
			return NULL;
		});
		$this->loadBlock(function() {
			return NULL;
		});
		$this->loadSchema(function() {
			return NULL;
		});

		if ($this->video && $this->block && !$this->block->contains($this->video))
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
		$this->template->video = $this->video;
		$this->template->block = $this->block;
		$this->template->schema = $this->schema;

		if ($this->video)
		{
			/** @var self|TextInput[] $this */
			$this['videoForm-form-title']->setDefaultValue($this->video->title);
			$this['videoForm-form-description']->setDefaultValue($this->video->description);
			$this['videoForm-form-youtubeId']->setDefaultValue($this->video->youtubeId);
		}
	}

}
