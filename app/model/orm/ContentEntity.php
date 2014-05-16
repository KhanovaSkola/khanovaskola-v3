<?php

namespace App\Orm;

use App\Rme\Tag;
use Nette\Utils\Strings;
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
