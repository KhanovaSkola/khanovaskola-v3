<?php

namespace App\Models\Orm;

use Nette\Utils\Strings;
use Orm;


/**
 * @property string      $title
 * @property string      $slug        {ignore}
 * @property NULL|string $description
 */
abstract class TitledEntity extends Entity
{

	public function getDescription()
	{
		$o = $this->getValue('description');
		return $o ?: NULL;
	}

	/**
	 * @return string
	 */
	public function getSlug()
	{
		return Strings::webalize($this->title);
	}

}
