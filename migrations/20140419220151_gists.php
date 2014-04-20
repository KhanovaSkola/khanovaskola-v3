<?php

use Phinx\Migration\AbstractMigration;


/** @see http://docs.phinx.org/en/latest/migrations.html#creating-a-new-migration */
class Gists extends AbstractMigration
{

	public function up()
	{
		$this->table('gists')
			->addColumn('name', 'string', ['limit' => 250])
			->addColumn('text', 'text')
			->addColumn('created_at', 'datetime')
			->addIndex(['name'], ['unique' => TRUE, 'name' => 'name'])
			->save();
	}

}
