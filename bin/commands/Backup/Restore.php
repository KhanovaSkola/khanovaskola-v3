<?php

namespace Bin\Commands\Backup;

use Commands\IMightLoseData;
use Nette\DI\Container;
use Symfony\Component\Console\Input\InputArgument;


class Restore extends Command implements IMightLoseData
{

	protected function configure()
	{
		$this
			->setName('backup:restore')
			->setDescription('Restore from backup (postgres, neo4j)')
			->addArgument('file', InputArgument::REQUIRED,
				'Timestamp of archive to restore');
	}

	public function invoke(Container $container)
	{
		$stamp = $this->in->getArgument('file');
		if (basename($stamp) !== $stamp)
		{
			$stamp = basename($stamp);
			$this->out->writeln("<error>Expected timestamp, using '$stamp'</error>");
		}

		$file = $this->paths->getBackup() . "/$stamp.tar.gz";
		if (!file_exists($file))
		{
			$this->out->writeln("<error>Archive not found at '$file'</error>");
			$this->out->writeln('<comment>Run <cmd>backup:list</cmd> to see all available archives</comment>');
			exit(1);
		}

		$this->out->writeln('Unarchiving backup file');
		$tempDir = $this->getTempDir();
		exec('tar -C ' . escapeshellarg($tempDir) . ' -zmxvf ' . escapeshellarg($file));

		$this->out->writeln('Importing postgres backup');
		$p = $container->parameters['database'];
		$query = sprintf('PGPASSWORD=%s pg_restore --host=%s --user=%s %s',
			escapeshellarg($p['password']),
			escapeshellarg($p['host']),
			escapeshellarg($p['username']),
			escapeshellarg($this->getTempNameDb())
		);
		exec($query);

		$this->out->writeln('Importing neo4j backup');
		$this->out->writeln('  - stopping neo4j-service');
		exec('sudo service neo4j-service stop');

		$this->out->writeln('  - unarchiving neo4j backup');
		$target = '/var/lib/neo4j/data';
		$query = sprintf('sudo rm -rf %s && sudo mkdir %s && sudo tar -C %s -zmxvf %s',
			escapeshellarg($target),
			escapeshellarg($target),
			escapeshellarg($target),
			escapeshellarg($this->getTempNameNeo())
		);
		exec($query);

		$this->out->writeln('  - starting neo4j-service');
		exec('sudo service neo4j-service start');

		$this->cleanUp();

		$this->out->writeln('<info>Successfully restored from archive</info>');
	}

}
