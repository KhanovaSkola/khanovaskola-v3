<?php

namespace App\Presenters;

use App\Components\Controls\Comments;
use App\Models\Rme;
use App\Presenters\Parameters;


final class Video extends Content
{

	use Parameters\Video;

	public function startup()
	{
		parent::startup();
		$this->loadVideo();
	}

	public function renderDefault()
	{
		$this->template->video = $this->video;
		$this->template->suggestions = $this->getSuggestions($this->video);
	}

	public function createComponentComments()
	{
		return $this->buildComponent(Comments::class, [$this->video]);
	}

}
