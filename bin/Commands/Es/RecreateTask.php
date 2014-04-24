<?php

namespace Commands\Es;

use App\Model\RepositoryContainer;
use App\Model\UsersRepository;
use App\Services\ElasticSearch;
use Commands\Command;
use Commands\IMightLoseData;
use Nelmio\Alice\ORM\Porm;
use Nelmio\Alice\Loader\Porm as Loader;
use Nette\Utils\Strings;
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
		$output->writeln("<info>Indices recreated</info>");
		$output->writeln("<comment>Run <cmd>db:fill</cmd> to rebuild index</comment>");
	}

}
