<?php

namespace App\Models\Orm;

use App\Models\Rme\Tag;
use Orm;


/**
 * e.g. Videos and exercise Blueprints
 *
 * @property string $description
 */
abstract class ContentEntity extends TitledEntity implements IIndexable
{

	public function addTag(Tag $tag)
	{
		/** @var ContentRepository $repo */
		$repo = $this->getRepository();
		$repo->addTagToContent($this, $tag);
	}

	/**
	 * @return TitledEntity[]
	 */
	final public function getChildren()
	{
		return [];
	}

}
