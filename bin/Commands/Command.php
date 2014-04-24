<?php

namespace Commands;

use Symfony\Component\Console\Command\Command as BaseCommand;
use Symfony\Component\Console\Formatter\OutputFormatterStyle;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


abstract class Command extends BaseCommand
{

	use ContainerTrait;

	/**
	 * @param string $desc
	 * @return BaseCommand
	 */
	public function setDescription($desc)
	{
		if ($this instanceof IMightLoseData)
		{
			$desc .= ' <comment>(loses current data)</comment>';
		}

		return parent::setDescription($desc);
	}

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

	public function run(InputInterface $input, OutputInterface $output)
	{
		$cmd = new OutputFormatterStyle('black', 'white', ['bold']);
		$output->getFormatter()->setStyle('cmd', $cmd);

		parent::run($input, $output);
	}

}
