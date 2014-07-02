<?php

namespace Bin\Commands\Neo4j;

use App\Models\Services\Neo4j;
use Bin\Commands\Command;
use Commands\IMightLoseData;
use Everyman\Neo4j\Cypher\Query;


class Reset extends Command implements IMightLoseData
{

	protected function configure()
	{
		$this
			->setName('neo4j:reset')
			->setDescription('Drops all nodes in neo4j, does not reset id');
	}

	public function invoke(Neo4j $neo)
	{
		$q = new Query($neo, '
			MATCH (n)
			OPTIONAL MATCH (n)-[r]-()
			DELETE n,r
		');
		$q->getResultSet();

		$this->out->writeln('<info>All nodes deleted</info>');
	}

}
