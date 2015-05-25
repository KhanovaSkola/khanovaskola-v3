<?php

namespace App\Models\Services;

use Nette\DI\Container;


class Paths
{

	protected $app;
	protected $backup;
	protected $bin;
	protected $libs;
	protected $log;
	protected $migrations;
	protected $temp;
	protected $tests;
	protected $www;

	public function __construct(Container $container)
	{
		$p = $container->getParameters();

		foreach ([
			'app' => 'appDir',
			'backup' => 'backupDir',
			'bin' => 'binDir',
			'libs' => 'libsDir',
			'log' => 'logDir',
			'migrations' => 'migrationsDir',
			'temp' => 'tempDir',
			'tests' => 'testsDir',
			'www' => 'wwwDir',
		] as $prop => $key)
		{
			$this->$prop = $p[$key];
		}
	}

	public function getApp()
	{
		return $this->app;
	}

	public function getBackup()
	{
		return $this->backup;
	}

	public function getBin()
	{
		return $this->bin;
	}

	public function getLibs()
	{
		return $this->libs;
	}

	public function getLog()
	{
		return $this->log;
	}

	public function getMigrations()
	{
		return $this->migrations;
	}

	public function getTemp()
	{
		return $this->temp;
	}

	public function getTests()
	{
		return $this->tests;
	}

	public function getWww()
	{
		return $this->www;
	}

	public function getJs()
	{
		return "{$this->www}/js";
	}

	public function getBlackboards()
	{
		return "{$this->www}/data/blackboard";
	}

	public function getPreviews()
	{
		return "{$this->www}/data/preview";
	}

	public function getTemplate($presenter, $view)
	{
		return "{$this->app}/templates/views/" . ucFirst($presenter) . "/{$view}.latte";
	}

}
