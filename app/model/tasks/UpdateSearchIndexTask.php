<?php

namespace App\Tasks;

use App\Rme\Video;
use App\Services\ElasticSearch;
use App\Services\Neo4j;
use Everyman\Neo4j\Cypher\Query;
use Nette\DI\Container;


class UpdateSearchIndexTask extends Task
{

	/** @var \App\Rme\Video */
	protected $video;

	public function __construct(Video $video)
	{
		$this->video = $video;
	}

	public function run(Container $context)
	{
		/** @var Neo4j $neo4j */
		$neo4j  = $context->getService('neo4j');

		$to = $this->findPathIds($neo4j, $this->video,
			'(previous:Video)-[r:NEXT]->(v:Video)');
		$from = $this->findPathIds($neo4j, $this->video,
			'(v:Video)-[r:NEXT]->(next:Video)');

		$pathsStartingHere = 0;
		foreach ($from as $id)
		{
			if (!in_array($id, $to))
			{
				$pathsStartingHere++;
			}
		}

		/** @var ElasticSearch $elastic */
		$elastic = $context->getService('elastic');
		$elastic->updateDoc($this->video->getShortEntityName(), $this->video->id, [
			'pathStarts' => $pathsStartingHere,
		]);
	}

	private function findPathIds(Neo4j $neo4j, Video $video, $match)
	{
		$q = new Query($neo4j, "
			MATCH $match
			WHERE v.eid = {eid}
			RETURN r.eid
		", [
			'eid' => $this->video->id,
		]);

		$ids = [];
		foreach ($q->getResultSet() as $row)
		{
			$ids[] = $row['eid'];
		}
		return $ids;
	}

}
