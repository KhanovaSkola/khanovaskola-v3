<?php

use Mikulas\Migrations\Migration;
require __DIR__ . '/bootstrap.php';


class __Example__ extends Migration
{

	public function up()
	{
		$this->table('')
			->addDateTime('created_at')
			->addString('title')
			->addString('slug')
			->addUniqueIndex(['title'])
			->addUniqueIndex(['slug'])
			->save();
	}

}
