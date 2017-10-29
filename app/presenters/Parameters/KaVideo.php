<?php

namespace App\Presenters\Parameters;

use App\Models\Rme;
use App\Presenters\Presenter;


trait KaVideo
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

}
