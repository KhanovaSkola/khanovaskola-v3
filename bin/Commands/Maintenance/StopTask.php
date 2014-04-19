<?php

namespace Commands\Maintenance;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class StopTask extends MaintenanceCommand
{

	public function setup()
	{
		$this->setDescription('Allows usage of the app by removing maintenance page');
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		copy($this->getAppFile(), $this->getIndexFile());
		$output->writeln('Maintenance mode stopped');
	}

}
