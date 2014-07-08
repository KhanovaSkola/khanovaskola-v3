<?php

namespace App\Models\Rme;

use App\Models\Orm\Mappers;


class VideosMapper extends Mappers\ContentMapper
{

	/**
	 * Traverses all relations: root category returns
	 * videos of all subcategories.
	 *
	 * @param Tag $tag
	 * @return \Orm\DibiCollection
	 */
	public function findByTag(Tag $tag)
	{
		return parent::findByTagByType($tag, 'Video');
	}

}
