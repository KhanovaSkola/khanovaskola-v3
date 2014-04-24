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
		$this->setDescription('Create new backup');
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$p = $this->container->parameters['database'];
		$query = sprintf('PGPASSWORD=%s pg_dump --host=%s --username=%s %s -f %s',
			escapeshellarg($p['password']),
			escapeshellarg($p['host']),
			escapeshellarg($p['username']),
			escapeshellarg($p['database']),
			escapeshellarg($this->getTempNameDb())
		);
		exec($query);

		$out = $this->getDir() . '/' . time() . '.tar.gz';
		exec(sprintf('tar cfvz %s -C %s .',
			escapeshellarg($out),
			escapeshellarg($this->getTempDir())
		));

		$this->cleanUp();

		$output->writeln("<info>Backup saved to '$out'</info>");
	}

}
