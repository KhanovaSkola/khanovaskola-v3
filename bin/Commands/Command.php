<?php

namespace Commands;

use Nette\DI\Container;
use Symfony\Component\Console\Command\Command as BaseCommand;
use Symfony\Component\Console\Output\OutputInterface;


abstract class Command extends BaseCommand
{

	use ContainerTrait;

	public function getName()
	{
		$name = get_class($this);
		$name = str_replace('Commands\\', '', $name);
		$name = str_replace('Task', '', $name);
		$name = str_replace('\\', ':', $name);

		return strToLower($name);
	}

	protected function configure()
	{
		$this->setName($this->getName());
	}

	public function setup() {}

	protected function fail(OutputInterface $output, $msg)
	{
		$output->writeln("<error>$msg</error>");
		exit(1);
	}

}
