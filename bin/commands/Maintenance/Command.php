<?php

namespace Bin\Commands\Maintenance;

use Bin\Commands;
use Nette\DI\Container;


abstract class Command extends Commands\Command
{

	protected function prepare(Container $container)
	{
		if (!file_exists($this->getAppFile($container)))
		{
			copy($this->getIndexFile($container), $this->getAppFile($container));
		}
	}

	/**
	 * Either app runner or maintenance page
	 * @return string path
	 */
	protected function getIndexFile(Container $container)
	{
		return $container->parameters['wwwDir'] . '/index.php';
	}

	/**
	 * Always contains app runner
	 * @return string path
	 */
	protected function getAppFile(Container $container)
	{
		return $container->parameters['wwwDir'] . '/_index.php';
	}

	/**
	 * Always contains maintenance page
	 * @return string path
	 */
	protected function getMaintenanceFile(Container $container)
	{
		return $container->parameters['wwwDir'] . '/_maintenance.php';
	}

}
