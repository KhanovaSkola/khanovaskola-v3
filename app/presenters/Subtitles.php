<?php

namespace App\Presenters;

use App\Presenters\Parameters;
use Nette\Application\Responses\TextResponse;


class Subtitles extends Presenter
{

	use Parameters\Video;

	public function startup()
	{
		parent::startup();

		$this->loadVideo();
	}

	public function actionDefault()
	{
		$this->sendResponse(new TextResponse($this->video->getSubtitles()));
	}

}
