<?php

namespace App\Models\Tasks;

use App\Models\Orm\RepositoryContainer;
use App\Models\Rme\Video;
use App\Models\Services\YoutubePreview;
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

	public function run(RepositoryContainer $orm, YoutubePreview $preview)
	{
		/** @var Video $video */
		$video = $this->pVideo->resolve($orm);

		$video->preview = $preview->getImageUrlFor($video->youtubeId);

		$orm->flush();
	}

}
