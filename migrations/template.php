<?php

require __DIR__ . '/bootstrap.php';


class __Example__ extends Migration
{

	public function up()
	{
		$this->table('')
			->addColumn('username', 'string', ['limit' => 250])
			->addIndex(['username', 'email'], ['unique' => TRUE, 'name' => 'username_email'])
			->save();
	}

}
