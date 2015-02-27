<?php

namespace App\Presenters;

use App\Presenters\Parameters;
use Nette\Application\Responses\JsonResponse;
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
		$this->setCacheControlPublic(60);
		$this->sendResponse(new TextResponse($this->video->getSubtitles()));
	}

	public function renderJson()
	{
		$this->setCacheControlPublic(60);

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
		$this->sendResponse(new JsonResponse($mapped));
	}

}
