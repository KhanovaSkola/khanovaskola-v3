<?php

namespace App\Model;

use App\InvalidStateException;
use Nelmio\Alice\Loader\Porm;
use Nette\Application\UI\Presenter;
use Nette\Caching\Cache;
use Nette\Utils\Strings;
use Orm;


/**
 * @property $title
 * @property $slug
 */
abstract class TitledEntity extends Entity
{

	/**
	 * Automatically updates slug
	 * @param $title
	 */
	public function setTitle($title)
	{
		$this->setValue('title', $title);
		$this->setValue('slug', Strings::webalize($title));
	}

}
