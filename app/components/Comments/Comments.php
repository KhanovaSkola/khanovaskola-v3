<?php

namespace App\Components;

use App\Rme\Video;


class Comments extends Control
{

	protected function renderDefault(Video $video)
	{
		$this->template->comments = $video->comments;
	}

}
