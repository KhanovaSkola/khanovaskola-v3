<?php

use Mikulas\Migrations\Migration;
require __DIR__ . '/bootstrap.php';


class Users extends Migration
{

	public function up()
	{
		$this->table('users')
			->addString('email')
			->addDateTime('created_at')
			->addString('name')
			->addString('family_name')
			->addString('nominative')
			->addString('vocative')
			->addString('gender', 6)
			->addOptionalString('password')
			->addOptionalString('facebook_id')
			->addOptionalString('facebook_access_token')
			->addOptionalString('google_id')
			->addOptionalString('google_access_token')
			->addUniqueIndex(['email'])
			->save();
	}

}
