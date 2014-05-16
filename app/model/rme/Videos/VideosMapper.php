<?php

namespace App\Rme;

use App\Orm\Mapper\ElasticSearchMapper;
use App\Orm\Mapper\Neo4jTrait;
use Everyman\Neo4j\Cypher\Query;
use Orm\Events;


class VideosMapper extends ContentMapper
{

	/**
	 * Traverses all relations: root category returns
	 * videos of all subcategories.
	 */
	public function findByTag(Tag $tag)
	{
		return parent::findByTagByType($tag, 'Video');
	}

}
