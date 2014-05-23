<?php

namespace Commands\Db;

use Commands\Command;
use Commands\IMightLoseData;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class ResetTask extends Command implements IMightLoseData
{

	public function setup()
	{
		$this->setDescription('Remove all tables and data from database');
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		/** @var \DibiConnection $db */
		$db = $this->container->getService('dibiConnection');

		$db->query('
			DROP SCHEMA public CASCADE;
			CREATE SCHEMA public;
		');
		$output->writeln('<info>Schema reset</info>');
		$output->writeln('<comment>Run <cmd>db:migrate</cmd> to recreate schema</comment>');
	}

}
