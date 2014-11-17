<?php

namespace App\Presenters;

use App\Models\Rme;
use App\Presenters\Parameters;
use Nette\Application\Responses\TextResponse;


final class Srt extends Presenter
{

	use Parameters\Video;

	public function startup()
	{
		parent::startup();
		$this->loadVideo();
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
