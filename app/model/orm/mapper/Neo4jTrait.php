<?php

namespace App\Orm\Mapper;

use App\Services\Neo4j;


trait Neo4jTrait
{

	/** @var Neo4j */
	protected $neo4j;

	public function injectNeo4j(Neo4j $neo4j)
	{
		$this->neo4j = $neo4j;
	}

}
