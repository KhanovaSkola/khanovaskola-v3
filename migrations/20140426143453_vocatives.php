<?php

use Mikulas\Migrations\Migration;
require __DIR__ . '/bootstrap.php';


class Vocatives extends Migration
{

	public function up()
	{
		$this->table('vocatives')
			->addString('gender', 6)
			->addString('nominative')
			->addString('vocative')
			->addNamedIndex(['gender', 'nominative'])
			->save();
		$this->query(file_get_contents(__DIR__ . '/../app/fixtures/vocatives.sql'));
	}

}
