<?php

/**
 * This file is part of the Nextras community extensions of Nette Framework
 *
 * @license    New BSD License
 * @link       https://github.com/nextras/migrations
 */

namespace Nextras\Migrations\Drivers;

use Nextras\Migrations\Entities\Migration;
use Nextras\Migrations\LockException;


/**
 * @author Mikulas Dite
 */
class PostgreSqlNetteDbDriver extends NetteDbDriver
{

	public function setupConnection()
	{
		$this->context->query('SET NAMES ?', 'utf8');
	}


	public function emptyDatabase()
	{
		$dbName = $this->context->fetchField('SELECT DATABASE()');
		$dbName = $this->context->getConnection()->getSupplementalDriver()->delimite($dbName);
		$this->context->query('DROP DATABASE ' . $dbName);
		$this->context->query('CREATE DATABASE ' . $dbName);
		$this->context->query('USE ' . $dbName);
	}


	public function createTable()
	{
		$this->context->query($this->getInitTableSource());
	}


	public function dropTable()
	{
		$this->context->query("DROP TABLE {$this->delimitedTableName}");
	}


	public function insertMigration(Migration $migration)
	{
		$row = array(
			'group' => $migration->group,
			'file' => $migration->filename,
			'checksum' => $migration->checksum,
			'executed' => $migration->executedAt,
			'ready' => FALSE,
		);

		$res = $this->context->query("INSERT INTO {$this->delimitedTableName} ? RETURNING id", $row);
		$migration->id = $res->fetchField('id');
	}


	public function markMigrationAsReady(Migration $migration)
	{
		$this->context->query("UPDATE {$this->delimitedTableName} SET ready = TRUE WHERE id = ?", $migration->id);
	}


	public function getAllMigrations()
	{
		$migrations = [];
		$result = $this->context->query("SELECT * FROM {$this->delimitedTableName}");
		foreach ($result as $row) {
			$migration = new Migration;
			$migration->id = $row['id'];
			$migration->group = $row['group'];
			$migration->filename = $row['file'];
			$migration->checksum = $row['checksum'];
			$migration->executedAt = $row['executed'];
			$migration->completed = (bool) $row['ready'];

			$migrations[] = $migration;
		}

		return $migrations;
	}


	public function getInitTableSource()
	{
		return "
CREATE TABLE IF NOT EXISTS {$this->delimitedTableName} (
	id SERIAL NOT NULL,
	\"group\" VARCHAR(100) NOT NULL,
	file VARCHAR(100) NOT NULL,
	checksum CHAR(32) NOT NULL,
	executed TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
	ready BOOLEAN NOT NULL DEFAULT FALSE,
	PRIMARY KEY(id),
	UNIQUE (\"group\", file)
);
		";
	}


	public function getInitMigrationsSource(array $files)
	{
		$out = '';
		foreach ($files as $file) {
			$out .= sprintf(
				'INSERT INTO ' . $this->delimitedTableName
			. ' ("group", "file", "checksum", "executed", "ready") VALUES'
			. " ('%s', '%s', '%s', '%s', TRUE);\n",
			$file->group->name, $file->name,  $file->checksum, date('Y-m-d H:i:s')
			);
		}
		return $out;
	}


	protected function tryLock()
	{
		try {
			$this->context->query("CREATE TABLE {$this->delimitedLockTableName} (foo INT)");
			return TRUE;
		} catch (\PDOException $e) {
			if ($e->getCode() === '42S01') { // already exists
				return FALSE;
			}

			throw $e;
		}
	}


	protected function tryUnlock()
	{
		try {
			$this->context->query("DROP TABLE {$this->delimitedLockTableName}");
		} catch (\PDOException $e) {
			if ($e->getCode() === '42S02') {
				throw new LockException('Unable to release lock, because it has been already released.');
			}

			throw $e;
		}
	}

}
