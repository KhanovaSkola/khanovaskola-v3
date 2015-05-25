<?php

namespace Bin\Commands\Blackboard;

use App\Models\Orm\RepositoryContainer;
use App\Models\Services\BlackboardPreview;
use App\Models\Services\Paths;
use Bin\Commands\Command;


class Preview extends Command
{

	protected function configure()
	{
		$this
			->setName('blackboard:preview')
			->setDescription('Generate preview image for recording');
	}

	public function invoke(RepositoryContainer $orm, Paths $paths, BlackboardPreview $generator)
	{
		$blackboards = $orm->contents->findAllBlackboards();
		foreach ($blackboards as $bb)
		{
			$file = $paths->getPreviews() . "/$bb->id.png";
			if (!file_exists($file))
			{
				$generator->generate($bb, $file);
				$bb->preview = "/data/preview/$bb->id.png";
				$this->out->writeln("<info>Preview saved to $file</info>");
			}
		}
		$orm->flush();
	}

}
