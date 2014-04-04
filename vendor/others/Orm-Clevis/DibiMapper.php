<?php

namespace Clevis\Skeleton\Orm;

use DibiFluent;
use Orm;


/**
 * Abstraktní předek všech dibi mapperů v aplikaci
 *
 * @author Vojtěch Dobeš
 */
abstract class DibiMapper extends Orm\DibiMapper
{

	/**
	 * @author Vojtěch Dobeš
	 *
	 * @return SqlConventional
	 */
	protected function createConventional()
	{
		return new SqlConventional($this);
	}

	/**
	 * Vrátí fluent základ pro 'findAll()'
	 *
	 * @return DibiFluent
	 */
	protected function fluentFindAll()
	{
		$table = $this->getTableName();
		return $this->connection->select('[e.*]')->from($table, 'e');
	}

}
