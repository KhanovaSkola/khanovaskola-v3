<?php

namespace Commands\Es;

use App\Services\ElasticSearch;
use Commands\Command;
use Commands\IMightLoseData;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class RecreateTask extends Command implements IMightLoseData
{

	public function setup()
	{
		$this->setDescription('Recreate all elasticsearch indices and mappings');
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		/** @var ElasticSearch $es */
		$es = $this->container->getService('elastic');

		$es->setupIndices();
		$output->writeln('<info>Indices recreated</info>');
	}

}
