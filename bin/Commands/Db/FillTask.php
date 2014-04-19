<?php

namespace Commands\Db;

use App\Model\RepositoryContainer;
use App\Model\UsersRepository;
use Commands\Command;
use Nelmio\Alice\ORM\Porm;
use Nelmio\Alice\Loader\Porm as Loader;
use Nette\Utils\Strings;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class FillTask extends Command
{

	public function setup()
	{
		$this->setDescription('Fill database with fake data');
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		/** @var RepositoryContainer $orm */
		$orm = $this->container->getService('orm');

		$repos = $this->container->parameters['repositories'];
		$map = [];
		foreach ($repos as $name => $repo)
		{
			$map[$orm->$name->getEntityClassName()] = $name;
		}

		$loader = new Loader('cs_CZ');
		$loader->setOrmMap($orm, $map);
		$loader->setLogger(function($log) use ($output) {
			$output->writeln("<info>$log</info>");
		});

		$objects = $loader->load(__DIR__ . '/../../fixtures.yml');

		try {
			$persist = new Porm($orm, $map);
			$persist->persist($objects);
		} catch (\DibiDriverException $e) {
			if ($e->getCode() === 1062)
			{
				$output->writeln("<error>Duplicate entry, you are probably running on already populated database</error>");
				exit(1);
			}
			$output->writeln("<error>Database error. Do you have most recent migrations?</error>");
			$output->writeln($e->getMessage());
			exit(1);
		}
		$output->writeln("Database filled with fake data");
	}

}
