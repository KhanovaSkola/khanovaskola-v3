<?php

namespace App\Model;


use Orm;


/**
 * @property string $name
 * @property string $text purified html
 */
class Gist extends Entity
{

	/**
	 * @param string $text unsafe html
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
