<?php

namespace App\Rme;

use App\Orm\ContentEntity;
use App\Orm\Mapper\ElasticSearchMapper;
use App\Orm\Mapper\Neo4jTrait;
use Everyman\Neo4j\Cypher\Query;
use Orm\Events;


abstract class ContentMapper extends ElasticSearchMapper
{

	use Neo4jTrait;

	public function registerEvents(Events $events)
	{
		parent::registerEvents($events);

		$this->registerOnPersistCreateNodeEvent($events);
	}

	public function addTagToContent(ContentEntity $entity, Tag $tag)
	{
		$type = $entity->getShortEntityName();

		$rel = Tag::REL_CONTAINS;
		$q = new Query($this->neo4j, "
			MATCH (e:$type),(t:Tag)
			WHERE e.eid = {eid} AND t.eid = {tagId}
			CREATE (t)-[r:$rel]->(e)
		", [
			'eid' => $entity->id,
			'tagId' => $tag->id,
		]);
		$q->getResultSet();
	}

	/**
	 * Traverses all relations: root category returns
	 * ContentEntity of all subcategories.
	 */
	protected function findByTagByType(Tag $tag, $type)
	{
		$rel = Tag::REL_CONTAINS;
		$q = new Query($this->neo4j, "
			MATCH (t:Tag)-[:$rel*..20]->(v:$type)
			WHERE t.eid={tagId}
			RETURN v.eid AS id
		", [
			'tagId' => $tag->id,
		]);
		$res = $q->getResultSet();

		$ids = [];
		foreach ($res as $row)
		{
			$ids[] = $row['id'];
		}

		return $this->findById($ids);
	}

	abstract public function findByTag(Tag $tag);

	public function getNextContent(ContentEntity $entity)
	{
		$type = $entity->getShortEntityName();
		$q = new Query($this->neo4j, "
			MATCH (current:$type)-[r:NEXT]->(next)
			WHERE current.eid={eid}
			RETURN next.eid AS entity_id, r.eid AS path_id, labels(next) as types
		", [
			'eid' => $entity->id,
		]);

		$res = [];
		foreach ($q->getResultSet() as $row)
		{
			$res[] = (object) [
				'entityId' => $row['entity_id'],
				'entityType' => $this->getEntityTypeFromLabels($row['types']),
				'pathId' => $row['path_id'],
			];
		}

		return $res;
	}

}
