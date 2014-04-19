<?php

namespace Commands\Maintenance;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class StartTask extends MaintenanceCommand
{

	public function setup()
	{
		$this->setDescription('Prevents using the application by showing a maintenance page');
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		copy($this->getMaintenanceFile(), $this->getIndexFile());
		$output->writeln('Maintenance mode started');
	}

}
