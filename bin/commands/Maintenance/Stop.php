<?php

namespace Bin\Commands\Maintenance;

use Nette\DI\Container;


class StopTask extends Command
{

	protected function configure()
	{
		$this
			->setName('maintenance:stop')
			->setDescription('Allows usage of the app by removing maintenance page');
	}

	public function invoke(Container $container)
	{
		$this->prepare($container);
		copy($this->getAppFile($container), $this->getIndexFile($container));
		$this->out->writeln('<info>Maintenance mode stopped</info>');
	}

}
