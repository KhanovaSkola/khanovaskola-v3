<?php

use Mikulas\Migrations\Migration;
require __DIR__ . '/bootstrap.php';


class __Example__ extends Migration
{

	public function up()
	{
		$this->table('')
			->addString('username')
			->addUniqueIndex(['username', 'email'])
			->save();
	}

}
