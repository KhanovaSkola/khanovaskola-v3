<?php

namespace Bin\Commands\Video;

use App\Models\Orm\RepositoryContainer;
use App\Models\Rme\Video;
use App\Models\Services\Youtube;
use Bin\Commands\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputArgument;


class Update extends Command
{

	protected function configure()
	{
		$this->setName('video:update')
			->setDescription('Set preview image url and duration for videos that dont have them')
			->addArgument('youtube_id', InputArgument::OPTIONAL,
				'metadata for video with this YouTubeID will be updated');
	}

	public function invoke(RepositoryContainer $orm, Youtube $youtube)
	{
		$youtube_id = $this->in->getArgument('youtube_id');

		$this->updatePreviews($orm, $youtube, $youtube_id);
		$this->updateDurations($orm, $youtube, $youtube_id);
	}

	protected function updatePreviews(RepositoryContainer $orm, Youtube $youtube, $youtube_id)
	{
		$count = 0;

    if ($youtube_id) {
		  $videos = $orm->contents->findAllVideos()->findBy(['youtube_id' => $youtube_id]);
    } else {
		  $videos = $orm->contents->findAllVideos()->findBy(['preview' => NULL, 'removed_at' => NULL]);
    }

		$progress = new ProgressBar($this->out, $videos->count());
		$progress->start();

		/** @var Video $video */
		foreach ($videos as $video)
		{
			$video->preview = $youtube->getImageUrlFor($video->youtubeId);
			$progress->advance();
			$count++;
		}
		$progress->finish();
		$this->out->write("\n");

		$orm->flush();
		$this->out->writeln("<info>Preview image updated for $count videos.</info>");
	}

	protected function updateDurations(RepositoryContainer $orm, Youtube $youtube, $youtube_id)
	{

		$count = 0;

    if ($youtube_id) {
		  $videos = $orm->contents->findAllVideos()->findBy(['youtube_id' => $youtube_id]);
    } else {
		  $videos = $orm->contents->findVideosWithoutDuration();
    }

		$progress = new ProgressBar($this->out, $videos->count());
		$progress->start();

		/** @var Video $video */
		foreach ($videos as $video)
		{
			$video->duration = $youtube->getDuration($video->youtubeId);
			$progress->advance();
			$count++;
		}
		$progress->finish();
		$this->out->write("\n");

		$orm->flush();
		$this->out->writeln("<info>Duration updated for $count videos.</info>");
	}

}
