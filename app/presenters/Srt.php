<?php

namespace App\Presenters;

use App\Models\Rme;
use Nette\Application\Responses\TextResponse;


final class Srt extends Presenter
{

	/**
	 * @persistent
	 * @var int
	 */
	public $videoId;

	/**
	 * @var Rme\Video
	 */
	public $video;

	public function startup()
	{
		parent::startup();

		$this->video = $this->orm->contents->getById($this->videoId);
		if (!$this->video || ! $this->video instanceof Rme\Video)
		{
			$this->error();
		}
	}

	public function renderDefault()
	{
		$this->sendResponse(new TextResponse($this->video->getSubtitles()));
	}

}
