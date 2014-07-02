<?php

namespace Bin\Commands\Backup;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class ListAll extends Command
{

	protected function configure()
	{
		$this
			->setName('backup:list')
			->setDescription('List all available backups');
	}

	public function invoke()
	{
		$count = 0;
		foreach (glob($this->paths->getBackup() . '/*.tar.gz') as $archive)
		{
			$match = [];
			preg_match('~/(\d+)\.tar\.gz$~', $archive, $match);

			$stamp = $match[1];
			$date = date('Y-m-d H:i', $stamp);
			$this->out->writeln("<comment>$stamp</comment> $date");
			$count++;
		}

		$str = 'archive' . ($count !== 1 ? 's' : '');
		$this->out->writeln("<info>Found $count $str</info>");
	}

}
