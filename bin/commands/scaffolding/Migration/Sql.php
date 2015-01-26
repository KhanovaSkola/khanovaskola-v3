<?php

namespace Bin\Commands\Scaffolding\Migration;

use Bin\Commands\Scaffolding\Command;
use Bin\Services\Scaffolding;
use Bin\Services\SchemaBuilder;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;


class Sql extends Command
{

	protected function configure()
	{
		$this->setName('scaffolding:migration:sql')
			->setDescription('Creates new sql migration')
			->addArgument('note', InputArgument::OPTIONAL, 'Migration name')
			->addOption('from-diff', 'd', InputOption::VALUE_NONE, 'Fill migration with changes from RMEs in app');
	}

	public function invoke(Scaffolding $scaffolding)
	{
		$file = $scaffolding->createSqlMigration($this->in->getArgument('note'));
		$this->writeCreatedFilesHeader();
		$this->writeCreatedFile($file);
	}

}
