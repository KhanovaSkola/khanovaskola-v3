<?php

namespace Bin\Commands\Data;

use Bin\Commands\Command;
use Commands\IMightLoseData;
use Nette\Database\Context;


class Drop extends Command implements IMightLoseData
{

	protected function configure()
	{
		$this->setName('data:drop')
			->setDescription('Removes all rows from psql');
	}

	public function invoke(Context $db)
	{
		$tables = $db->query("
				SELECT table_name FROM information_schema.tables
				WHERE table_schema = 'public'
					AND table_name != 'migrations'
					AND table_name != 'vocatives'
					AND table_name != 'badges'
			")->fetchPairs();
		$db->query('TRUNCATE ' . implode(',', $tables) . ' RESTART IDENTITY');
		$this->out->writeln('<info>done</info>');
	}

}
