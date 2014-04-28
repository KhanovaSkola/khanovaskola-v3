<?php

namespace App\Model;

use App\InvalidStateException;
use Nelmio\Alice\Loader\Porm;
use Nette\Application\UI\Presenter;
use Nette\Caching\Cache;
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
		try {
			$update = $this->getValue('title') !== NULL;
		}
		catch (Orm\NotValidException $e)
		{
			// title is unset and null is not allowed
			$update = FALSE;
		}

		$this->setValue('title', $title);
		$this->setValue('slug', Strings::webalize($title));
	}

}
