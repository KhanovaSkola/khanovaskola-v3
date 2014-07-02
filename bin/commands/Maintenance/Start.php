<?php

namespace Bin\Commands\Maintenance;

use Nette\DI\Container;


class StartTask extends Command
{

	protected function configure()
	{
		$this
			->setName('maintenance:start')
			->setDescription('Prevents using the application by showing a maintenance page');
	}

	public function invoke(Container $container)
	{
		$this->prepare($container);
		copy($this->getMaintenanceFile($container), $this->getIndexFile($container));
		$this->out->writeln('<info>Maintenance mode started</info>');
	}

}
