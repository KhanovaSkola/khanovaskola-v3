<?php

namespace App\Presenters;

use App\Models\Structs\CachingJsonResponse;
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

	public function renderJson()
	{
		$array = $this->video->getParsedSubtitles();
		$mapped = [];
		foreach ($array as list($start, $end, $text))
		{
			$mapped[] = [
				'start' => $start,
				'end' => $end,
				'text' => $text,
			];
		}

		$this->sendResponse(new CachingJsonResponse($mapped));
	}

}
