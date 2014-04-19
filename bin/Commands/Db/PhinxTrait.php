<?php

namespace Commands\Db;

use App\NotImplementedException;
use Commands\ContainerTrait;
use Phinx\Config\Config;


trait PhinxTrait
{

	use ContainerTrait;

	public function setup()
	{
		$this->setConfig($this->getAppConfig());

		$this->setName('db:' . $this->getName());
	}

	private function getAdapterName($driver)
	{
		switch ($driver)
		{
			case 'mysqli':
				return 'mysql';
			case 'postgre':
				return 'pgsql';
			case 'sqlite':
				return 'sqlite';
			default:
				throw new NotImplementedException;
		}
	}

	protected function getAppConfig()
	{
		$p = $this->container->parameters['database'];

		return new Config([
			'paths' => [
				'migrations' => 'migrations',
			],
			'environments' => [
				'default_migration_table' => 'migrations',
				'default_database' => 'development',
				'development' => [
					'adapter' => $this->getAdapterName($p['driver']),
					'host' => $p['host'],
					'user' => $p['username'],
					'pass' => $p['password'],
					'name' => $p['database'],
					'charset' => $p['charset'],
				]
			]
		]);
	}

}
