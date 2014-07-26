<?php

namespace Bin\Commands\Scaffolding\Migration;

use Bin\Commands\Scaffolding\Command;
use Bin\Services\Scaffolding;
use Symfony\Component\Console\Input\InputArgument;


class Php extends Command
{

	protected function configure()
	{
		$this->setName('scaffolding:migration:php')
			->setDescription('Creates new php migration')
			->addArgument('note', InputArgument::OPTIONAL, 'Migration name');
	}

	public function invoke(Scaffolding $scaffolding)
	{
		$file = $scaffolding->createPhpMigration($this->in->getArgument('note'));
		$this->writeCreatedFilesHeader();
		$this->writeCreatedFile($file);
	}

}
