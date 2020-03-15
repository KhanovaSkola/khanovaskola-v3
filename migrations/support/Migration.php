<?php

namespace App\Migrations;

use Nette\Database\Context;
use Nette\SmartObject;


/**
 * Supports public injected properties
 */
abstract class Migration
{
  use SmartObject;

	/**
	 * @var Context @inject
	 */
	public $db;

	abstract public function run();

}
