<?php

namespace App\Presenters;

use App\Rme\Video;


final class VideoPresenter extends ContentPresenter
{

	/**
	 * @var int
	 * @persistent
	 */
	public $videoId;

	/** @var Video */
	protected $video;

	public function startup()
	{
		parent::startup();

		if (!$this->video = $this->orm->videos->getById($this->videoId))
		{
			$this->error();
		}
	}

	public function renderDefault()
	{
		$this->template->video = $this->video;
		$this->template->suggestions = $this->getSuggestions($this->video);
	}

}
