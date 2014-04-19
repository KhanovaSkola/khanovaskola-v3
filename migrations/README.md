http://docs.phinx.org/en/latest/migrations.html#the-change-method

create db:

	$this->table('user')
		->addColumn('username', 'string', ['limit' => 250])
		->addIndex(['username', 'email'], ['unique' => TRUE])
		->save();
query:

	$this->execute('DELETE FROM users');

