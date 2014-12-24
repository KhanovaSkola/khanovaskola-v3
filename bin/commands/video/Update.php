<?php

namespace Bin\Commands\Video;

use App\Models\Orm\RepositoryContainer;
use App\Models\Rme\Video;
use App\Models\Services\Youtube;
use Bin\Commands\Command;
use Symfony\Component\Console\Helper\ProgressBar;


class Update extends Command
{

	protected function configure()
	{
		$this->setName('video:update')
			->setDescription('Set preview image url and duration for videos that dont have them');
	}

	public function invoke(RepositoryContainer $orm, Youtube $youtube)
	{
		$this->updatePreviews($orm, $youtube);
		$this->updateDurations($orm, $youtube);
	}

	protected function updatePreviews(RepositoryContainer $orm, Youtube $youtube)
	{
		$count = 0;

		$videos = $orm->contents->findAllVideos()->findBy(['preview' => NULL]);
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

	protected function updateDurations(RepositoryContainer $orm, Youtube $youtube)
	{
		$count = 0;

		$videos = $orm->contents->findAllVideos()->findBy(['duration' => NULL]);
		$progress = new ProgressBar($this->out, $videos->count());
		$progress->start();

		/** @var Video $video */
		foreach ($videos as $video)
		{
			$video->duration = $youtube->getMeta($video->youtubeId)->data->duration;
			$progress->advance();
			$count++;
		}
		$progress->finish();
		$this->out->write("\n");

		$orm->flush();
		$this->out->writeln("<info>Duration updated for $count videos.</info>");
	}

}
