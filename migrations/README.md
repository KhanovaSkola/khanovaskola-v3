http://docs.phinx.org/en/latest/migrations.html#the-change-method

Phinx can reverse the following commands:

	createTable
	renameTable
	addColumn
	renameColumn
	addIndex
	addForeignKey

query:
	
	$this->execute('DELETE FROM users');

create db:

	$users = $this->table('users');
	        $users->addColumn('username', 'string', array('limit' => 20))
	              ->addIndex(array('username', 'email'), array('unique' => true))
	              ->save();
