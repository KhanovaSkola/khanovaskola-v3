<?php

namespace App\Components;

use Nette;
use Nette\Forms\Controls;


/**
 * @method addDynamic(\string $name, callable $cb)
 */
class Form extends \Nette\Application\UI\Form
{

	public function addSubmit($name = 'send', $caption = NULL)
	{
		return parent::addSubmit($name, $caption);
	}

}
