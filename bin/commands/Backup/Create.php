<?php

namespace Bin\Commands\Backup;

use Nette\DI\Container;


/**
 * @TODO elasticsearch snapshots
 */
class Create extends Command
{

	protected function configure()
	{
		$this
			->setName('backup:create')
			->setDescription('Create new backup (postgres, neo4j)');
	}

	public function invoke(Container $container)
	{
		$this->out->writeln('Backing up postgres database');
		$p = $container->parameters['database'];
		$query = sprintf('PGPASSWORD=%s pg_dump --format=tar --host=%s --username=%s %s -f %s',
			escapeshellarg($p['password']),
			escapeshellarg($p['host']),
			escapeshellarg($p['username']),
			escapeshellarg($p['database']),
			escapeshellarg($this->getTempNameDb())
		);
		exec($query);

		$this->out->writeln('Backing up neo4j');
		$this->out->writeln('  - stopping neo4j-service');
		exec('sudo service neo4j-service stop');
		$this->out->writeln('  - archiving neo4j files');
		exec(sprintf('tar cfvz %s -C %s .',
			escapeshellarg($this->getTempNameNeo()),
			escapeshellarg('/var/lib/neo4j/data')
		));
		$this->out->writeln('  - starting neo4j-service');
		exec('sudo service neo4j-service start');

		$this->out->writeln('Archiving backup files');
		$out = $this->paths->getBackup() . '/' . time() . '.tar.gz';
		exec(sprintf('tar cfvz %s -C %s .',
			escapeshellarg($out),
			escapeshellarg($this->getTempDir())
		));

		$this->cleanUp();

		$this->out->writeln("<info>Backup saved to '$out'</info>");
	}

}
