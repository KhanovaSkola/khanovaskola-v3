<?php

namespace App\Presenters;

use App\Models\Rme;
use App\Models\Rme\VideoView;
use App\Models\Structs\VideoEvents;
use Nette\Application\BadRequestException;


final class Js extends Presenter
{

	/**
	 * @param int $videoId
	 * @throws BadRequestException
	 */
	public function actionVideoViewBegin($videoId)
	{
		if (!$video = $this->orm->contents->getById($videoId))
		{
			$this->error();
		}
		if (!$video instanceof Rme\Video)
		{
			$this->error();
		}

		$view = new VideoView();
		$view->video = $video;
		$view->user = $this->userEntity;
		$this->orm->videoViews->attach($view);

		$this->orm->flush();
		$this->sendJson(['viewId' => $view->id]);
	}

	/**
	 * @param int $viewId
	 * @param float $from
	 * @param float $to
	 * @throws BadRequestException
	 */
	public function actionVideoViewSeek($viewId, $from, $to)
	{
		/** @var VideoView $view */
		if (!$view = $this->orm->videoViews->getById($viewId))
		{
			$this->error();
		}
		$view->addEvent(VideoEvents\Seek::from($from, $to));
		$this->orm->flush();
		$this->sendJson(['status' => 'ok']);
	}

	/**
	 * @param int $viewId
	 * @param float $at
	 * @param float $duration
	 * @throws BadRequestException
	 */
	public function actionVideoViewPause($viewId, $at, $duration)
	{
		/** @var VideoView $view */
		if (!$view = $this->orm->videoViews->getById($viewId))
		{
			$this->error();
		}

		$view->addEvent(VideoEvents\Pause::from($at, $duration));
		$this->orm->flush();
		$this->sendJson(['status' => 'ok']);
	}

	/**
	 * @param int $viewId
	 * @param float $at seconds
	 * @param boolean $isFullscreenNow
	 * @throws BadRequestException
	 */
	public function actionVideoViewChangeView($viewId, $at, $isFullscreenNow)
	{
		/** @var VideoView $view */
		if (!$view = $this->orm->videoViews->getById($viewId))
		{
			$this->error();
		}

		$view->addEvent(VideoEvents\ChangeView::from($at, $isFullscreenNow));
		$this->orm->flush();
		$this->sendJson(['status' => 'ok']);
	}

	/**
	 * @param int $viewId
	 * @param float $percent
	 * @param float $time total of real time watched
	 * @param float $furthest
	 * @throws BadRequestException
	 */
	public function actionVideoViewTick($viewId, $percent, $time, $furthest)
	{
		/** @var VideoView $view */
		if (!$view = $this->orm->videoViews->getById($viewId))
		{
			$this->error();
		}

		$view->percent = $percent;
		$view->time = $time;
		$view->furthest = $furthest;

		$this->orm->flush();
		$this->sendJson(['status' => 'ok']);
	}

}
