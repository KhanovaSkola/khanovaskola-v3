<?php

use Mikulas\Migrations\Migration;
require __DIR__ . '/bootstrap.php';


class Answers extends Migration
{

	public function up()
	{
		$this->table('answers')
			->addDateTime('created_at')
			->addString('answer')
			->addBool('correct')
			->addInteger('seed')
			->addRelation('user_id', 'users')
			->addRelation('blueprint_id', 'blueprints')
			->save();
	}

}
