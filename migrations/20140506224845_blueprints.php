<?php

use Mikulas\Migrations\Migration;
require __DIR__ . '/bootstrap.php';


class Blueprints extends Migration
{

	public function up()
	{
		$this->table('blueprints')
			->addDateTime('created_at')
			->addString('title')
			->addString('slug')
			->addString('description')
			->addText('vars')
			->addText('question')
			->addText('answer')
			->addText('hints')
			->addUniqueIndex(['title'])
			->addUniqueIndex(['slug'])
			->save();
	}

}
