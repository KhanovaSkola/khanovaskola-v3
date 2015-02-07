<?php

namespace App\Models\Services\Consumers;

use App\Models\Orm\RepositoryContainer;
use App\Models\Rme\Video;
use App\Models\Services\Youtube;


class UpdateVideo extends Consumer
{

	/**
	 * @var Youtube
	 */
	private $youtube;

	public function __construct(RepositoryContainer $orm, Youtube $youtube)
	{
		parent::__construct($orm);
		$this->youtube = $youtube;
	}

	public function invoke(array $args)
	{
		/** @var Video $video */
		$video = $args['video'];

		$video->preview = $this->youtube->getImageUrlFor($video->youtubeId);
		$video->duration = $this->youtube->getMeta($video->youtubeId)->data->duration;

		$this->orm->flush();
	}
}
