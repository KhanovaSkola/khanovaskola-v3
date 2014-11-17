<?php

namespace Bin\Commands\Backup;

use App\Models\Services\Paths;
use Bin\Commands;
use Symfony\Component\Process\Process;


abstract class Command extends Commands\Command
{

	/**
	 * @var Paths
	 * @inject
	 */
	public $paths;

	protected function cleanUp()
	{
		unlink($this->getTempNameDb());
		rmdir($this->getTempDir());
	}

	/**
	 * @return string dir path
	 */
	protected function getTempDir()
	{
		$dir = $this->paths->getBackup() . '/.temp';
		if (!file_exists($dir))
		{
			mkdir($dir);
		}

		return $dir;
	}

	protected function getNameDb()
	{
		return 'database.sql';
	}

	/**
	 * @return string file path
	 */
	protected function getTempNameDb()
	{
		return $this->getTempDir() . '/' . $this->getNameDb();
	}

	protected function cmd($query)
	{
		$process = new Process($query);
		$process->setTimeout(360);
		$process->run();
		return $process->getOutput();
	}

}

