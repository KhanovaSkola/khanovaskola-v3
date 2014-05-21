<?php

use Mikulas\Migrations\Migration;
require __DIR__ . '/bootstrap.php';


class AnswerHint extends Migration
{

	public function up()
	{
		$this->table('answers')
			->addBool('hint')
			->save();
	}

}
