<?php

use Mikulas\Migrations\Migration;
require __DIR__ . '/bootstrap.php';


class AnswerTime extends Migration
{

	public function up()
	{
		$this->table('answers')
			->addInteger('time')
			->addBool('inactivity')
			->save();
	}

}
