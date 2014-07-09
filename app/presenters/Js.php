<?php

namespace App\Presenters;

use App\Models\Rme\VideoView;
use App\Models\Structs\VideoEvents;


final class Js extends Presenter
{

	/**
	 * @param int $videoId
	 */
	public function actionVideoViewBegin($videoId)
	{
		if (!$video = $this->orm->videos->getById($videoId))
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
	 */
	public function actionVideoViewSkipTo($viewId, $from, $to)
	{
		/** @var VideoView $view */
		if (!$view = $this->orm->videoViews->getById($viewId))
		{
			$this->error();
		}
		$view->addEvent(VideoEvents\Skip::from($from, $to));
		$this->orm->flush();
		$this->sendJson(['status' => 'ok']);
	}

	/**
	 * @param int $viewId
	 * @param float $at
	 * @param float $duration
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
	 * @param boolean $isFullscreenNow
	 */
	public function actionVideoChangeView($viewId, $at, $isFullscreenNow)
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
	 */
	public function actionVideoTick($viewId, $percent, $time, $furthest)
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
