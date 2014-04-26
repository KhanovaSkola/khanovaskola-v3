<?php

use Phinx\Migration\AbstractMigration;


class Vocatives extends AbstractMigration
{

	public function up()
	{
		$this->table('vocatives')
			->addColumn('gender', 'string', ['limit' => 6])
			->addColumn('nominative', 'string', ['limit' => 100])
			->addColumn('vocative', 'string', ['limit' => 100])
			->addIndex(['gender', 'nominative'], ['name' => 'gender_nominative'])
			->save();
		$this->query(file_get_contents(__DIR__ . '/../app/fixtures/vocatives.sql'));
	}

}
