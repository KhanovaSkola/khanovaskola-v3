<?php

namespace App\Models\Tasks;

use App\Models\Orm\RepositoryContainer;
use App\Models\Rme\Video;
use App\Models\Services\Youtube;
use App\Models\Structs\EntityPointer;


class UpdateVideo extends Task
{

	/**
	 * @var EntityPointer to Video
	 */
	private $pVideo;

	public function __construct(Video $video)
	{
		$this->pVideo = new EntityPointer($video);
	}

	public function run(RepositoryContainer $orm, Youtube $youtube)
	{
		/** @var Video $video */
		$video = $this->pVideo->resolve($orm);

		$video->preview = $youtube->getImageUrlFor($video->youtubeId);
		$video->duration = $youtube->getMeta($video->youtubeId)->data->duration;

		$orm->flush();
	}

}
