<?php

use Phinx\Migration\AbstractMigration;


class Users extends AbstractMigration
{

    public function up()
    {
	    $this->table('users')
		    ->addColumn('name', 'string', ['limit' => 250])
		    ->addColumn('password', 'string', ['limit' => 250, 'null' => TRUE])
		    ->addColumn('email', 'string', ['limit' => 250])
		    ->addColumn('facebook_id', 'string', ['limit' => 250])
		    ->addColumn('facebook_access_token', 'string', ['limit' => 250])
		    ->addColumn('created_at', 'datetime')
		    ->save();
    }

}
