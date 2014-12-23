<?php

namespace App\Models\Orm;

use Nette\Utils\Strings;
use Orm;


/**
 * @property string      $title
 * @property NULL|string $description
 */
abstract class TitledEntity extends Entity
{

	public function getDescription()
	{
		$o = $this->getValue('description');
		return $o ?: NULL;
	}

}
