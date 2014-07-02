<?php

namespace Bin\Commands;

use App\ImplementationException;
use Bin\Support\VariadicArgvInput;
use Commands\IMightLoseData;
use Nette\DI\Container;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Command\Command as SCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Output\OutputInterface;


/**
 * Supports injected services and
 * autowiring on invoke method
 */
abstract class Command extends SCommand
{

	/**
	 * @var VariadicArgvInput
	 */
	protected $in;

	/**
	 * @var OutputInterface|ConsoleOutput
	 */
	protected $out;

	public function setApplication(Application $application = NULL)
	{
		parent::setApplication($application);

		/** @var Container $container */
		$container = $this->getHelper('container')->getContainer();
		$container->callInjects($this);
	}

	/**
	 * @param string $desc
	 * @return static
	 */
	public function setDescription($desc)
	{
		if ($this instanceof IMightLoseData)
		{
			$desc .= ' <comment>(loses current data)</comment>';
		}

		return parent::setDescription($desc);
	}

	final protected function execute(InputInterface $input, OutputInterface $output)
	{
		$this->in = $input;
		$this->out = $output;

		if (!method_exists($this, 'invoke'))
		{
			$class = get_class($this);
			throw new ImplementationException("Command $class must define method 'invoke'.");
		}

		/** @var Container $container */
		$container = $this->getHelper('container')->getContainer();
		return $container->callMethod([$this, 'invoke']);
	}

}
