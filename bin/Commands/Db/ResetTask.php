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


class ResetTask extends Command
{

	public function setup()
	{
		$this->setDescription('Remove all tables and data from database (DROPS DATA)');
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		/** @var \DibiConnection $db */
		$db = $this->container->getService('dibiConnection');

		$db->query('
			DROP SCHEMA public CASCADE;
			CREATE SCHEMA public;
		');
		$output->writeln("<info>Schema reset</info>");
		$output->writeln("<comment>Run <cmd>db:migrate</cmd> to recreate schema</comment>");
	}

}
