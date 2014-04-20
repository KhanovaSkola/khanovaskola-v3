<?php

use Phinx\Migration\AbstractMigration;


class __Example__ extends AbstractMigration
{

	public function up()
	{
		$this->table('')
			->addColumn('username', 'string', ['limit' => 250])
			->addIndex(['username', 'email'], ['unique' => TRUE, 'name' => 'username_email'])
			->save();
	}

}
