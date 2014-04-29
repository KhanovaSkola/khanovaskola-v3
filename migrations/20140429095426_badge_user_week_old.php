<?php

use Mikulas\Migrations\Migration;
require __DIR__ . '/bootstrap.php';


class BadgeUserWeekOld extends Migration
{

	public function up()
	{
		$this->query("INSERT INTO badges (key, created_at) VALUES
			('UserWeekOld', Now())
		");
	}

}
