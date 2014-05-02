<?php

namespace App\Rme;

use App\Orm\TitledEntity;
use Orm;
use Orm\ManyToMany;
use Orm\OneToMany;


/**
 * @property string $description
 *
 * @property ManyToMany $videos {m:n videos $cateogries}
 * @property OneToMany $categories {1:m categories $parent}
 */
class Category extends TitledEntity
{

	/**
	 * @return TitledEntity[]
	 */
	public function getChildren()
	{
		/** @var Category[] $categories */
		$categories = $this->categories->get()->fetchAll();

		$videos = $this->videos->get()->fetchAll();
		foreach ($categories as $cat)
		{
			$videos = array_merge($videos, $cat->videos->get()->fetchAll());
		}

		return array_merge($videos, $categories);
	}
}
