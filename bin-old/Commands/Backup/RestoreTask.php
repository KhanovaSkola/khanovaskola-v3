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
		$this->setDescription('Restore from backup (postgres, neo4j)');
		$this->addArgument('file', InputArgument::REQUIRED,
			'Timestamp of archive to restore');
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$stamp = $input->getArgument('file');
		if (basename($stamp) !== $stamp)
		{
			$stamp = basename($stamp);
			$this->writeln("<error>Expected timestamp, using '$stamp'</error>");
		}

		$file = $this->getDir() . "/$stamp.tar.gz";
		if (!file_exists($file))
		{
			$this->writeln("<error>Archive not found at '$file'</error>");
			$this->writeln('<comment>Run <cmd>backup:list</cmd> to see all available archives</comment>');
			exit(1);
		}

		$this->writeLnVerbose('Unarchiving backup file');
		$tempDir = $this->getTempDir();
		exec('tar -C ' . escapeshellarg($tempDir) . ' -zmxvf ' . escapeshellarg($file));

		$this->writeLnVerbose('Importing postgres backup');
		$p = $this->container->parameters['database'];
		$query = sprintf('PGPASSWORD=%s pg_restore --host=%s --user=%s %s',
			escapeshellarg($p['password']),
			escapeshellarg($p['host']),
			escapeshellarg($p['username']),
			escapeshellarg($this->getTempNameDb())
		);
		exec($query);

		$this->writeLnVerbose('Importing neo4j backup');
		$this->writeLnVerbose('  - stopping neo4j-service');
		exec('sudo service neo4j-service stop');

		$this->writeLnVerbose('  - unarchiving neo4j backup');
		$target = '/var/lib/neo4j/data';
		$query = sprintf('sudo rm -rf %s && sudo mkdir %s && sudo tar -C %s -zmxvf %s',
			escapeshellarg($target),
			escapeshellarg($target),
			escapeshellarg($target),
			escapeshellarg($this->getTempNameNeo())
		);
		exec($query);

		$this->writeLnVerbose('  - starting neo4j-service');
		exec('sudo service neo4j-service start');

		$this->cleanUp();

		$this->writeln('<info>Successfully restored from archive</info>');
	}

}
