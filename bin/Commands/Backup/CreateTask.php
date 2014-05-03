<?php

namespace Commands\Backup;


use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


/**
 * @TODO elsaticsearch snapshots
 */
class CreateTask extends Command
{

	public function setup()
	{
		$this->setDescription('Create new backup (postgres, neo4j)');
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$this->writeLnVerbose('Backing up postgres database');
		$p = $this->container->parameters['database'];
		$query = sprintf('PGPASSWORD=%s pg_dump --format=tar --host=%s --username=%s %s -f %s',
			escapeshellarg($p['password']),
			escapeshellarg($p['host']),
			escapeshellarg($p['username']),
			escapeshellarg($p['database']),
			escapeshellarg($this->getTempNameDb())
		);
		exec($query);

		$this->writeLnVerbose('Backing up neo4j');
		$this->writeLnVerbose('  - stopping neo4j-service');
		exec('sudo service neo4j-service stop');
		$this->writeLnVerbose('  - archiving neo4j files');
		exec(sprintf('tar cfvz %s -C %s .',
			escapeshellarg($this->getTempNameNeo()),
			escapeshellarg('/var/lib/neo4j/data')
		));
		$this->writeLnVerbose('  - starting neo4j-service');
		exec('sudo service neo4j-service start');

		$this->writeLnVerbose('Archiving backup files');
		$out = $this->getDir() . '/' . time() . '.tar.gz';
		exec(sprintf('tar cfvz %s -C %s .',
			escapeshellarg($out),
			escapeshellarg($this->getTempDir())
		));

		$this->cleanUp();

		$output->writeln("<info>Backup saved to '$out'</info>");
	}

}
