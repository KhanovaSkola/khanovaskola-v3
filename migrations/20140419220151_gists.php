<?php

use Mikulas\Migrations\Migration;
require __DIR__ . '/bootstrap.php';


/** @see http://docs.phinx.org/en/latest/migrations.html#creating-a-new-migration */
class Gists extends Migration
{

	public function up()
	{
		$this->table('gists')
			->addString('name')
			->addDateTime('created_at')
			->addText('text')
			->addUniqueIndex(['name'])
			->save();
	}

}
