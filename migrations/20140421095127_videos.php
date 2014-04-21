<?php

use Phinx\Migration\AbstractMigration;


class Videos extends AbstractMigration
{

	public function up()
	{
		$this->table('videos')
			->addColumn('title', 'string', ['limit' => 250])
			->addColumn('description', 'string', ['limit' => 250])
			->addColumn('youtube_id', 'string', ['limit' => 250])
			->addColumn('youtube_id_original', 'string', ['limit' => 250])
			->addColumn('created_at', 'datetime')
			->addIndex(['youtube_id'], ['unique' => TRUE, 'name' => 'youtube_id'])
			->save();
	}

}
