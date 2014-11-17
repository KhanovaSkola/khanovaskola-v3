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
			->setDescription('Restore from backup (import postgres)')
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
		$this->cmd('tar -C ' . escapeshellarg($tempDir) . ' -zmxvf ' . escapeshellarg($file));

		$this->out->writeln('Importing postgres backup');
		$p = $container->parameters['database'];
		$query = sprintf('PGPASSWORD=%s pg_restore --host=%s --port=%s --user=%s --clean --dbname=%s %s',
			escapeshellarg($p['password']),
			escapeshellarg($p['host']),
			escapeshellarg(isset($p['port']) ? $p['port'] : 5432),
			escapeshellarg($p['username']),
			escapeshellarg($p['database']),
			escapeshellarg($this->getTempNameDb())
		);
		$this->cmd($query);

		$this->cleanUp();

		$this->out->writeln('<info>Successfully restored from archive</info>');
		$this->out->writeln('<comment>Don\'t forget to run es:rebuild && es:repopulate</comment>');
	}

}
