<?php

namespace App\Presenters\Parameters;

use App\Models\Rme;
use App\Presenters\Presenter;


trait Video
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

	/**
	 * @return Rme\Video
	 */
	public function getVideo()
	{
		return $this->video;
	}

	protected function loadVideo(callable $fallback = NULL)
	{
		/** @var Presenter $this */
		if ($this->videoId && !ctype_digit("$this->videoId"))
		{
			$this->error();
		}

		$this->video = $this->orm->contents->getById($this->videoId);
		if (!$this->video || ! $this->video instanceof Rme\Video)
		{
			if (!$fallback)
			{
				$this->error();
			}
			$this->video = $fallback();
		}
	}

}
