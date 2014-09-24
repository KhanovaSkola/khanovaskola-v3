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
		// Allows for easier lazy user creation on video page
		// as it removes set-cookie race condition.
		// This response will also be cached in varnish.
		header_remove('set-cookie');

		$this->sendResponse(new TextResponse($this->video->getSubtitles()));
	}

}
