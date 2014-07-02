<?php

namespace App\Presenters;

use App\Components\Controls\Comments;
use App\Models\Rme;


final class Video extends Content
{

	/**
	 * @var int
	 * @persistent
	 */
	public $videoId;

	/**
	 * @var Rme\Video
	 */
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

	public function createComponentComments()
	{
		return $this->buildComponent(Comments::class, [$this->video, $this->userEntity, $this->orm]);
	}

}
