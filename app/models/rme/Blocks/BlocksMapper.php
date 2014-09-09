<?php

namespace App\Models\Rme;

use App\Models\Orm\Mappers;
use App\Models\Orm\TitledEntity;
use App\NotImplementedException;
use Orm\EventArguments;
use Orm\Events;


class BlocksMapper extends Mappers\Mapper
{

	public function registerEvents(Events $events)
	{
		$events->addCallbackListener($events::HYDRATE_AFTER, function (EventArguments $args)
		{
			$q = new Query($this->neo4j, '
				MATCH (a)-[r:BLOCK_NEXT]->(next)
				WHERE r.eid = {blockEid}
				RETURN a.eid, labels(a) as `a.types`, next.eid, labels(next) as `next.types`
			', [
				'blockEid' => $args->data['id'],
			]);

			$pointers = [];
			/** @var Row $row */
			foreach ($q->getResultSet() as $row)
			{
				$id = $row['a.eid'];
				$type = $this->getEntityTypeFromLabels($row['a.types']);
				$pointers["$type|$id"] = TRUE;

				$id = $row['next.eid'];
				$type = $this->getEntityTypeFromLabels($row['next.types']);
				$pointers["$type|$id"] = TRUE;
			}

			$list = [];
			foreach ($pointers as $pointer => $tmp)
			{
				list($type, $id) = explode('|', $pointer);
				if ($type === 'Video')
				{
					$list[] = $this->model->videos->getById($id);
				}
				else if ($type === 'Blueprint')
				{
					$list[] = $this->model->blueprints->getById($id);
				}
				else
				{
					throw new NotImplementedException;
				}
			}

			$args->entity->list = $list;
		});
		$events->addCallbackListener($events::SERIALIZE_BEFORE, function (EventArguments $args)
		{
			$args->params['list'] = FALSE;
			$args->params['schemas'] = FALSE;
		});
		$events->addCallbackListener($events::PERSIST_AFTER, function (EventArguments $args)
		{
			/** @var Block $block */
			$block = $args->entity;

			// remove current relations to prevent duplicates
			$q = new Query($this->neo4j, '
				MATCH (a)-[r:BLOCK_NEXT]->(next)
				WHERE r.eid = {blockEid}
				DELETE r
			', [
				'blockEid' => $block->id,
			]);
			$q->getResultSet();

			/** @var TitledEntity $current */
			foreach ($block->list as $i => $current)
			{
				if (!isset($block->list[$i + 1]))
				{
					continue;
				}

				/** @var TitledEntity $next */
				$next = $block->list[$i + 1];

				$typeCurrent = $current->getShortEntityName();
				$typeNext = $next->getShortEntityName();
				$q = new Query($this->neo4j, "
					MATCH (current:$typeCurrent), (next:$typeNext)
					WHERE current.eid = {currentEid} AND next.eid = {nextEid}
					CREATE (current)-[:BLOCK_NEXT {eid: {blockEid}}]->(next)
				", [
					'currentEid' => $current->id,
					'nextEid' => $next->id,
					'blockEid' => $block->id,
				]);
				$q->getResultSet();
			}
		});
	}

}
