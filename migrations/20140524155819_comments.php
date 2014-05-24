<?php

use Mikulas\Migrations\Migration;
require __DIR__ . '/bootstrap.php';


class Comments extends Migration
{

	public function up()
	{
		$this->table('comments')
			->addDateTime('created_at')
			->addText('text')
			->addRelation('author_id', 'users')
			->addRelation('video_id', 'videos')
			->save();
	}

}
