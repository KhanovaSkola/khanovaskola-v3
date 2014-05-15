<?php

namespace App\Rme;

use App\Orm\Mapper\Mapper;
use App\Orm\Mapper\Neo4jTrait;
use App\Orm\TitledEntity;
use Everyman\Neo4j\Cypher\Query;
use Orm\EventArguments;
use Orm\Events;


class PathsMapper extends Mapper
{

	use Neo4jTrait;

	public function registerEvents(Events $events)
	{
		$events->addCallbackListener($events::SERIALIZE_BEFORE, function(EventArguments $args) {
			$args->values['author_id'] = $args->values['author'];
			$args->params['author_id'] = TRUE;
			unset($args->values['author']);
			unset($args->params['author']);

			$args->params['list'] = FALSE;
		});
		$events->addCallbackListener($events::PERSIST_AFTER, function(EventArguments $args) {
			/** @var Path $path */
			$path = $args->entity;

			// remove current relations to prevent duplicates
			$q = new Query($this->neo4j, '
					MATCH (a)-[r:NEXT]->(next)
					WHERE r.eid = {pathEid}
					DELETE r
				', [
				'pathEid' => $path->id,
			]);
			$q->getResultSet();

			/** @var TitledEntity $current */
			foreach ($path->list as $i => $current)
			{
				if (!isset($path->list[$i + 1]))
				{
					continue;
				}

				/** @var TitledEntity $next */
				$next = $path->list[$i + 1];

				$typeCurrent = ucFirst($current->getShortEntityName());
				$typeNext = ucFirst($next->getShortEntityName());
				$q = new Query($this->neo4j, "
					MATCH (current:$typeCurrent), (next:$typeNext)
					WHERE current.eid = {currentEid} AND next.eid = {nextEid}
					CREATE (current)-[:NEXT {eid: {pathEid}}]->(next)
				", [
					'currentEid' => $current->id,
					'nextEid' => $next->id,
					'pathEid' => $path->id,
				]);
				$q->getResultSet();
			}
		});
	}

}
