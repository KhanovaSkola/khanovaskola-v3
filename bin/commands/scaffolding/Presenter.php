<?php

namespace Bin\Commands\Scaffolding;

use Bin\Services\Scaffolding;
use Inflect\Inflect;
use Symfony\Component\Console\Input\InputArgument;


class Presenter extends Command
{

	protected function configure()
	{
		$this->setName('scaffolding:presenter')
			->setDescription('Creates module (if used), presenter and default view')
			->setHelp("Specify either presenter name such as 'Homepage',\n" .
				"or a presenter name with module such as 'Front:Homepage',\n" .
				"which will create the module if it does not yet exist.\n" .
				"Don't forget to update your routes to use modules.")
			->addArgument('presenterName', InputArgument::REQUIRED, 'such as Homepage or Front:Homepage');
	}

	public function invoke(Scaffolding $scaffolding)
	{
		$name = $this->in->getArgument('presenterName');

		$file = $scaffolding->createPresenter($name);
		$this->writeCreatedFilesHeader();
		$this->writeCreatedFile($file);
		$file = $scaffolding->createDefaultView($name);
		$this->writeCreatedFile($file);

		$this->out->writeln("<comment>Don't forget to update your routes.</comment>");
	}

}
