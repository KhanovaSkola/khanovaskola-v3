<?php

namespace Bin\Commands\Scaffolding\Test;

use Bin\Commands\Scaffolding\Command;
use Bin\Services\Scaffolding;
use Symfony\Component\Console\Input\InputArgument;


class Unit extends Command
{

	protected function configure()
	{
		$this->setName('scaffolding:test:unit')
			->setDescription('Creates new unit test')
			->addArgument('name', InputArgument::REQUIRED);
	}

	public function invoke(Scaffolding $scaffolding)
	{
		$name = ucFirst($this->in->getArgument('name'));

		$file = $scaffolding->createUnitTest($name);
		$this->writeCreatedFilesHeader();
		$this->writeCreatedFile($file);
	}

}
