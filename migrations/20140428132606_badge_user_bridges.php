<?php

use Mikulas\Migrations\Migration;
require __DIR__ . '/bootstrap.php';


class BadgeUserBridges extends Migration
{

	public function up()
	{
		$this->table('badge_user_bridges')
			->addDateTime('created_at')
			->addRelation('badge_id', 'badges')
			->addRelation('user_id', 'users')
			->addOptionalRelation('video_id', 'videos')
			->save();
	}

}
