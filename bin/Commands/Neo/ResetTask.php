<?php

namespace Commands\Neo;

use App\Model\RepositoryContainer;
use App\Model\UsersRepository;
use App\Services\ElasticSearch;
use App\Services\Neo4j;
use Commands\Command;
use Commands\IMightLoseData;
use Everyman\Neo4j\Cypher\Query;
use Nelmio\Alice\ORM\Porm;
use Nelmio\Alice\Loader\Porm as Loader;
use Nette\Utils\Strings;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class ResetTask extends Command implements IMightLoseData
{

	public function setup()
	{
		$this->setDescription('Drops all nodes in neo4j, does not reset id');
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		/** @var Neo4j $neo */
		$neo = $this->container->getService('neo4j');

		$q = new Query($neo, '
			MATCH (n)
			OPTIONAL MATCH (n)-[r]-()
			DELETE n,r
		');
		$res = $q->getResultSet();

		$output->writeln("<info>All nodes deleted</info>");
	}

}
