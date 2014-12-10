<?php

namespace App\Models\Orm;

use Nette\Utils\Strings;
use Orm;


/**
 * @property string     $title
 * @property string     $slug
 * @property string     $description
 */
abstract class TitledEntity extends Entity
{

	/**
	 * @param $title
	 */
	public function setTitle($title)
	{
		$this->setValue('title', $title);
		$this->setValue('slug', Strings::webalize($title));
	}

}
