<?php

namespace App\Models\Rme;

use App\Models\Orm\Mappers;
use App\Models\Orm\TitledEntity;
use App\Tasks\UpdateSearchIndexTask;
use Everyman\Neo4j\Cypher\Query;
use Orm\EventArguments;
use Orm\Events;


class PathsMapper extends Mappers\Mapper
{

	use Mappers\Neo4jTrait;
	use Mappers\QueueTrait;

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
					RETURN a.eid, labels(a) as types
				', [
				'pathEid' => $path->id,
			]);
			$res = $q->getResultSet();

			$idsToUpdate = [];
			foreach ($res as $row)
			{
				$id = $row['eid'];
				$type = $this->getEntityTypeFromLabels($row['types']);
				$idsToUpdate["$id|$type"] = TRUE;
			}

			/** @var TitledEntity $current */
			foreach ($path->list as $i => $current)
			{
				if (!isset($path->list[$i + 1]))
				{
					continue;
				}

				$id = $current->id;
				$type = $current->getShortEntityName();
				$idsToUpdate["$id|$type"] = TRUE;

				/** @var TitledEntity $next */
				$next = $path->list[$i + 1];

				$typeCurrent = $current->getShortEntityName();
				$typeNext = $next->getShortEntityName();
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

			foreach ($idsToUpdate as $key => $tmp)
			{
				list($id, $type) = explode('|', $key);
				$task = new UpdateSearchIndexTask($type, $id);
				$this->queue->enqueue($task);
			}

		});
	}

}
