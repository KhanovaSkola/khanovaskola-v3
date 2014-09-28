<?php

namespace Bin\Commands\Schema;

use Bin\Commands\Command;
use Commands\IMightLoseData;
use Nette\Database\Context;


class Reset extends Command implements IMightLoseData
{

	protected function configure()
	{
		$this->setName('schema:reset')
			->setDescription('Removes all tables from current schema');
	}

	public function invoke(Context $db)
	{
		$db->query('DROP SCHEMA "public" CASCADE');
		$db->query('CREATE SCHEMA "public"');

		$this->out->writeln('<info>Schema reset</info>');
	}

}
