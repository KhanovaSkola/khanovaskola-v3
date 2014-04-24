<?php

namespace Commands\Backup;


use Commands\IMightLoseData;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class RestoreTask extends Command implements IMightLoseData
{

	public function setup()
	{
		$this->setDescription('Restore from backup');
		$this->addArgument('file', InputArgument::REQUIRED,
			'Timestamp of archive to restore');
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$stamp = $input->getArgument('file');
		if (basename($stamp) !== $stamp)
		{
			$stamp = basename($stamp);
			$output->writeln("<error>Expected timestamp, using '$stamp'</error>");
		}

		$file = $this->getDir() . "/$stamp.tar.gz";
		if (!file_exists($file))
		{
			$output->writeln("<error>Archive not found at '$file'</error>");
			$output->writeln("<comment>Run <cmd>backup:list</cmd> to see all available archives</comment>");
			exit(1);
		}

		$tempDir = $this->getTempDir();
		exec('tar -C ' . escapeshellarg($tempDir) . ' -zxvf ' . escapeshellarg($file));

		$p = $this->container->parameters['database'];
		$query = sprintf('PGPASSWORD=%s psql --host=%s --user=%s %s -f %s',
			escapeshellarg($p['password']),
			escapeshellarg($p['host']),
			escapeshellarg($p['username']),
			escapeshellarg($p['database']),
			escapeshellarg($this->getTempNameDb())
		);
		exec($query);

		$this->cleanUp();

		$output->writeln("<info>Sucessfully restored from archive</info>");
	}

}
