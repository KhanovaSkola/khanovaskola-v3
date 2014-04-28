<?php

use Mikulas\Migrations\Migration;
require __DIR__ . '/bootstrap.php';


class Videos extends Migration
{

	public function up()
	{
		$this->table('videos')
			->addString('title')
			->addString('slug')
			->addText('description')
			->addString('youtube_id', 50)
			->addString('youtube_id_original', 50)
			->addDateTime('created_at')
			->addOptionalRelation('redirect_to', 'videos')
			->addUniqueIndex(['youtube_id'])
			->save();
	}

}
