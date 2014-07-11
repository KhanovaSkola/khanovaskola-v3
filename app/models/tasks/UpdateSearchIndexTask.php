<?php

namespace App\Models\Tasks;

use App\Models\Services\ElasticSearch;
use App\Models\Services\Neo4j;
use Everyman\Neo4j\Cypher\Query;
use Nette\DI\Container;


class UpdateSearchIndexTask extends Task
{

	/** @var int */
	protected $entityId;

	/** @var string */
	protected $type;

	public function __construct($type, $entityId)
	{
		$this->type = $type;
		$this->entityId = $entityId;
	}

	public function run(Container $context)
	{
		/** @var Neo4j $neo4j */
		$neo4j = $context->getByType(Neo4j::class);

		$to = $this->findPathIds($neo4j, $this->entityId,
			"(previous:Content)-[r:NEXT]->(v:$this->type)");
		$from = $this->findPathIds($neo4j, $this->entityId,
			"(v:$this->type)-[r:NEXT]->(next:Content)");

		$pathsStartingHere = 0;
		foreach ($from as $id)
		{
			if (!in_array($id, $to))
			{
				$pathsStartingHere++;
			}
		}

		/** @var ElasticSearch $elastic */
		$elastic = $context->getByType(ElasticSearch::class);
		$elastic->updateDoc($this->type, $this->entityId, [
			'pathStarts' => $pathsStartingHere,
		]);
	}

	private function findPathIds(Neo4j $neo4j, $entityId, $match)
	{
		$q = new Query($neo4j, "
			MATCH $match
			WHERE v.eid = {eid}
			RETURN r.eid
		", [
			'eid' => $entityId,
		]);

		$ids = [];
		foreach ($q->getResultSet() as $row)
		{
			$ids[] = $row['eid'];
		}
		return $ids;
	}

}
