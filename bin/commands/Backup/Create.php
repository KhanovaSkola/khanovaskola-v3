<?php

namespace Bin\Commands\Backup;

use Nette\DI\Container;


class Create extends Command
{

	protected function configure()
	{
		$this
			->setName('backup:create')
			->setDescription('Create new backup (postgres)');
	}

	public function invoke(Container $container)
	{
		$this->out->writeln('Backing up postgres database');
		$p = $container->parameters['database'];
		$query = sprintf('PGPASSWORD=%s pg_dump --format=tar --host=%s --port=%s --username=%s %s -f %s',
			escapeshellarg($p['password']),
			escapeshellarg($p['host']),
			escapeshellarg(isset($p['port']) ? $p['port'] : 5432),
			escapeshellarg($p['username']),
			escapeshellarg($p['database']),
			escapeshellarg($this->getTempNameDb())
		);
		$this->cmd($query);

		$this->out->writeln('Archiving backup files');
		$out = $this->paths->getBackup() . '/' . time() . '.tar.gz';
		$this->cmd(sprintf('tar cfvz %s -C %s .',
			escapeshellarg($out),
			escapeshellarg($this->getTempDir())
		));

		$this->cleanUp();

		$this->out->writeln("<info>Backup saved to '$out'</info>");
	}

}
