<?php

namespace Bin\Services;

use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DBALException;
use Doctrine\DBAL\DriverManager;


class DoctrineFactory
{

	/**
	 * @var array
	 */
	private $dbConfig;

	public function __construct(array $dbConfig)
	{
		$this->dbConfig = $dbConfig;
	}

	/**
	 * @param array $config
	 * @return array
	 */
	protected function translateNetteToDoctrine(array $config)
	{
		return [
			'driver' => 'pdo_pgsql',
			'dbname' => $config['database'],
			'user' => $config['username'],
			'password' => $config['password'],
			'host' => $config['host'],
		];
	}

	/**
	 * @return Connection
	 * @throws DBALException
	 */
	public function create()
	{
		return DriverManager::getConnection($this->translateNetteToDoctrine($this->dbConfig), new Configuration);
	}

}
