<?php

namespace Bin\Commands\Video;

use App\Models\Orm\RepositoryContainer;
use App\Models\Rme\Video;
use App\Models\Services\YoutubePreview;
use Bin\Commands\Command;
use Symfony\Component\Console\Helper\ProgressBar;


class Preview extends Command
{

	protected function configure()
	{
		$this->setName('video:preview')
			->setDescription('Set preview image url for videos that dont have it');
	}

	public function invoke(RepositoryContainer $orm, YoutubePreview $preview)
	{
		$count = 0;

		$videos = $orm->contents->findAllVideos()->findBy(['preview' => NULL]);
		$progress = new ProgressBar($this->out, $videos->count());
		$progress->start();

		/** @var Video $video */
		foreach ($videos as $video)
		{
			$video->preview = $preview->getImageUrlFor($video->youtubeId);
			$progress->advance();
			$count++;
		}
		$progress->finish();
		$this->out->write("\n");

		$orm->flush();
		$this->out->writeln("<info>Preview image updated for $count videos.</info>");
	}

}
