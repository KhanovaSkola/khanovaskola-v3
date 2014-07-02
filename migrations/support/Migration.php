<?php

namespace App\Migrations;

use Nette\Database\Context;
use Nette\Object;


/**
 * Supports public injected properties
 */
abstract class Migration extends Object
{

	/**
	 * @var Context @inject
	 */
	public $db;

	abstract public function run();

}
