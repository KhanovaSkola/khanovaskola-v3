<?php

namespace App\Rme;

use App\Orm\Mapper\ElasticSearchMapper;
use App\Orm\Mapper\Neo4jTrait;
use Everyman\Neo4j\Cypher\Query;
use Orm\Events;


class VideosMapper extends ElasticSearchMapper
{

	use Neo4jTrait;

	public function registerEvents(Events $events)
	{
		parent::registerEvents($events);

		$this->registerOnPersistCreateNodeEvent($events);
	}

	public function addTagToVideo(Video $video, Tag $tag)
	{
		$rel = Tag::REL_CONTAINS;
		$q = new Query($this->neo4j, "
			MATCH (v:Video),(t:Tag)
			WHERE v.eid = {videoId} AND t.eid = {tagId}
			CREATE (t)-[r:$rel]->(v)
			RETURN r
		", [
			'videoId' => $video->id,
			'tagId' => $tag->id,
		]);
		$q->getResultSet();
	}

	/**
	 * Traverses all relations: root category returns
	 * videos of all subcategories.
	 */
	public function findByTag(Tag $tag)
	{
		$rel = Tag::REL_CONTAINS;
		$q = new Query($this->neo4j, "
			MATCH (t:Tag)-[:$rel*..20]->(v:Video)
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

	public function getNextFor(Video $video)
	{
		$q = new Query($this->neo4j, "
			MATCH (current:Video)-[r:NEXT]->(next)
			WHERE current.eid={eid}
			RETURN next.eid AS video_id, r.eid AS path_id
		", [
			'eid' => $video->id,
		]);

		$res = [];
		foreach ($q->getResultSet() as $row)
		{
			$res[] = (object) [
				'videoId' => $row['video_id'],
				'pathId' => $row['path_id'],
			];
		}

		return $res;
	}

}
