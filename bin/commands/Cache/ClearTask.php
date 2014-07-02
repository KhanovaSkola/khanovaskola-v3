<?php

namespace Bin\Commands\Cache;


use App\Models\Services\Paths;
use Bin\Commands\Command;


class Clear extends Command
{

	protected function configure()
	{
		$this
			->setName('cache:clear')
			->setDescription('Clear cache and opcache');
	}

	public function invoke(Paths $paths)
	{
		$tmp = $paths->getTemp();
		exec('sudo rm -rf ' . escapeshellarg("$tmp/cache/_*"));
		$this->out->writeln('<info>Cache cleared</info>');

		// TODO clear opcache
	}

}
