<?php

namespace App\Components;

use Kdyby\Replicator\Container;
use Nette;
use Nette\Forms\Controls;


/**
 * @method Container addDynamic(\string $name, callable $cb)
 */
class Form extends \Nette\Application\UI\Form
{

	public function addSubmit($name = NULL, $caption = NULL)
	{
		if (!$name)
		{
			$name = 'send';
		}
		return parent::addSubmit($name, $caption);
	}

}
