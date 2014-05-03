<?php

namespace Commands;

use Symfony\Component\Console\Command\Command as BaseCommand;
use Symfony\Component\Console\Formatter\OutputFormatterStyle;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


abstract class Command extends BaseCommand
{

	use ContainerTrait;

	/** @var OutputInterface */
	private $output;

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
		$this->output = $output;

		parent::run($input, $output);
	}

	protected function writeLn()
	{
		return call_user_func_array([$this->output, 'writeLn'], func_get_args());
	}

	protected function writeLnVerbose()
	{
		if ($this->output->isVerbose())
		{
			return call_user_func_array([$this->output, 'writeLn'], func_get_args());
		}

		return FALSE;
	}

}
