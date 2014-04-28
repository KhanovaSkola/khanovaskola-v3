<?php

namespace Mikulas\Migrations;

use Phinx\Migration\AbstractMigration;


abstract class Migration extends AbstractMigration
{

	const RESTRICT = 'RESCTRICT';

	public static function restrict()
	{
		return [
			'delete' => self::RESTRICT,
			'update' => self::RESTRICT
		];
	}

	/**
	 * @param string $tableName
	 * @param array $options
	 * @return Table
	 */
	public function table($tableName, $options = [])
	{
		return new Table($tableName, $options, $this->getAdapter());
	}

}
