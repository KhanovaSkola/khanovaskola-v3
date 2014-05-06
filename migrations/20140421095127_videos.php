<?php

use Mikulas\Migrations\Migration;
require __DIR__ . '/bootstrap.php';


class Videos extends Migration
{

	public function up()
	{
		$this->table('videos')
			->addDateTime('created_at')
			->addString('title')
			->addString('slug')
			->addText('description')
			->addString('youtube_id', 50)
			->addString('youtube_id_original', 50)
			->addOptionalRelation('redirect_to', 'videos')
			->addUniqueIndex(['title'])
			->addUniqueIndex(['slug'])
			->addUniqueIndex(['youtube_id'])
			->save();
	}

}
