<?php

use Mikulas\Migrations\Migration;
require __DIR__ . '/bootstrap.php';


class Badges extends Migration
{

	public function up()
	{
		$this->table('badges')
			->addDateTime('created_at')
			->addString('key')
			->save();

		$this->query("INSERT INTO badges (key, created_at) VALUES
			('VideoWatched', Now())
		");
	}

}
