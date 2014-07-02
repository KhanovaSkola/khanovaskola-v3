<?php

namespace Commands\Backup;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class ListTask extends Command
{

	public function setup()
	{
		$this->setDescription('List all available backups');
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$count = 0;
		foreach (glob($this->getDir() . '/*.tar.gz') as $archive)
		{
			$match = [];
			preg_match('~/(\d+)\.tar\.gz$~', $archive, $match);

			$stamp = $match[1];
			$date = date('Y-m-d H:i', $stamp);
			$output->writeln("<comment>$stamp</comment> $date");
			$count++;
		}

		$str = 'archive' . ($count !== 1 ? 's' : '');
		$output->writeln("<info>Found $count $str</info>");
	}

}
