<?php

namespace App\Tasks;

use Nette\DI\Container;
use Nette\Object;


abstract class Task extends Object
{

	abstract public function run(Container $container);

}
