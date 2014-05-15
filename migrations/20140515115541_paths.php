<?php

use Mikulas\Migrations\Migration;
require __DIR__ . '/bootstrap.php';


class Paths extends Migration
{

	public function up()
	{
		$this->table('paths')
			->addDateTime('created_at')
			->addOptionalRelation('author_id', 'users')
			->save();
	}

}
