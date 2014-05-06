<?php

namespace Mikulas\Migrations;

use App\DeprecatedException;


/**
 * @method Table addColumn()
 */
class Table extends \Phinx\Db\Table
{

	public function addRelation($column, $targetTable, $nullable = FALSE)
	{
		$this->addColumn($column, 'integer', ['null' => $nullable]);
		$this->addForeignKey($column, $targetTable, 'id', Migration::restrict());
		return $this;
	}

	public function addOptionalRelation($column, $targetTable)
	{
		return $this->addRelation($column, $targetTable, TRUE);
	}

	public function addString($column, $length = 250, $nullable = FALSE)
	{
		return $this->addColumn($column, 'string', ['limit' => $length, 'null' => $nullable]);
	}

	public function addOptionalString($column, $length = 250)
	{
		return $this->addString($column, $length, TRUE);
	}

	public function addText($column)
	{
		return $this->addColumn($column, 'text');
	}

	public function addDateTime($column)
	{
		return $this->addColumn($column, 'datetime');
	}

	public function addIndex($columns, $options = [])
	{
		throw new DeprecatedException('use addNamedIndex');
	}

	/**
	 * @param array $columns
	 * @param bool $unique
	 * @return self
	 */
	public function addNamedIndex(array $columns, $unique = FALSE)
	{
		$name = implode('_', $columns);
		return parent::addIndex($columns, ['name' => "{$this->name}_$name", 'unique' => $unique]);
	}

	public function addUniqueIndex(array $columns)
	{
		return $this->addNamedIndex($columns, TRUE);
	}

}
