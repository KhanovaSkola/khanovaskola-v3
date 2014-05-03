<?php

use Mikulas\Migrations\Migration;
require __DIR__ . '/bootstrap.php';


class Tags extends Migration
{

	public function up()
	{
		$this->table('tags')
			->addDateTime('created_at')
			->addString('title')
			->addString('slug')
			->addUniqueIndex(['title'])
			->save();
	}

}
