<?php

namespace App\Migrations;

use Nette\DI\Container;
use Nextras\Migrations\Entities\File;
use Nextras\Migrations\Extensions\SimplePhp;


class PhpClass extends SimplePhp
{

	/**
	 * @var Container
	 */
	private $container;

	public function __construct(array $parameters = [], Container $container)
	{
		parent::__construct($parameters);
		$this->container = $container;
	}


	public function execute(File $sql)
	{
		$version = (int) basename($sql->name, '.php');
		$class = "App\\Migrations\\Migration$version";
		extract($this->getParameters());
		include $sql->getPath();
		/** @var Migration $migration */
		$migration = new $class();
		$this->container->callInjects($migration);
		$migration->run();
	}

}
