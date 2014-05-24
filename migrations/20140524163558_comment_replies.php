<?php

use Mikulas\Migrations\Migration;
require __DIR__ . '/bootstrap.php';


class CommentReplies extends Migration
{

	public function up()
	{
		$this->table('comments')
			->addOptionalRelation('in_reply_to_id', 'comments')
			->save();
	}

}
