<?php

namespace App\Presenters;

use App\Rme\Video;


class VideoPresenter extends BasePresenter
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
	}

}
