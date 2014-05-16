<?php

namespace App\Rme;

use App\Orm\Mapper\Neo4jTrait;


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
