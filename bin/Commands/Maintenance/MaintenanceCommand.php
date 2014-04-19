<?php


namespace Commands\Maintenance;

use Commands\Command;


abstract class MaintenanceCommand extends Command
{

	public function setup()
	{
		parent::setup();

		if (!file_exists($this->getAppFile()))
		{
			copy($this->getIndexFile(), $this->getAppFile());
		}
	}

	/**
	 * Either app runner or mainenance page
	 * @return string path
	 */
	protected function getIndexFile()
	{
		return $this->container->parameters['wwwDir'] . '/index.php';
	}

	/**
	 * Always contains app runner
	 * @return string path
	 */
	protected function getAppFile()
	{
		return $this->container->parameters['wwwDir'] . '/_index.php';
	}

	/**
	 * Always contains maintenance page
	 * @return string path
	 */
	protected function getMaintenanceFile()
	{
		return $this->container->parameters['wwwDir'] . '/_maintenance.php';
	}

}
