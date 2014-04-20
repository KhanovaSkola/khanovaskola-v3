<?php

namespace App\Model;

use Nette\DateTime;
use Nette\Security\Passwords;
use Orm;


/**
 * @property string $name
 * @property string $text purified html
 * @property DateTime $createdAt {default now}
 */
class Gist extends Entity
{

	/**
	 * @param $text unsafe html
	 * @param bool $pure set to TRUE to skip purification
	 */
	public function setText($text, $pure = FALSE)
	{
		if (!$pure)
		{
			$purifier = $this->model->getContext()->getService('purifier');
			$text = $purifier->filter($text);
		}
		$this->setValue('text', $text);
	}

}
