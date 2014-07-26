<?php

namespace Bin\Commands\Scaffolding;

use Bin\Services\Scaffolding;
use Inflect\Inflect;
use Symfony\Component\Console\Input\InputArgument;


class Rme extends Command
{

	protected function configure()
	{
		$this->setName('scaffolding:rme')
			->setDescription('Creates classes for new repository, mapper and entity')
			->addArgument('entityName', InputArgument::REQUIRED, "singular, such as 'User' ('user' is also accepted)")
			->setHelp("Specify entity properties in the <fg=blue>name:type</fg=blue> format:\n" .
				"<fg=blue>name:string publishedAt:DateTime visible:boolean</fg=blue>\n"
			);
	}

	public function invoke(Scaffolding $scaffolding)
	{
		$name = ucFirst($this->in->getArgument('entityName'));
		$file = $scaffolding->createRepository($name);
		$this->writeCreatedFilesHeader();
		$this->writeCreatedFile($file);

		$file = $scaffolding->createMapper($name);
		$this->writeCreatedFile($file);

		$params = [];
		foreach ($this->in->getVariadics() as $arg)
		{
			list($param, $type) = explode(':', $arg) + [NULL, 'mixed'];
			$params[$param] = $type;
		}
		$file = $scaffolding->createEntity($name, $params);
		$this->writeCreatedFile($file);

		$this->out->writeln("\n<comment>Don't forget to add repository to your Model class</comment>");

		$plural = Inflect::pluralize($name);
		$repoClass = 'Rme\\' . ucFirst($plural) . 'Repository';
		$param = lcFirst($plural);
		$this->out->writeln(" * @property-read $repoClass \$$param");
	}

}
