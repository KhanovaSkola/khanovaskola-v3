<?php

namespace App\Models\Orm;

use Nette\Utils\Strings;
use Orm;


/**
 * @property string $title
 * @property string $slug
 */
abstract class TitledEntity extends Entity
{

	/**
	 * Automatically updates slug and creates RedirectEntity
	 * @param $title
	 */
	public function setTitle($title)
	{
		$this->setValue('title', $title);
		$this->setValue('slug', Strings::webalize($title));
	}

}
