<?php

use Mikulas\Migrations\Migration;
require __DIR__ . '/bootstrap.php';


class BadgeExerciseMastery extends Migration
{

	public function up()
	{
		$this->query("INSERT INTO badges (key, created_at) VALUES
			('ExerciseMastery', Now())
		");

		$this->table('badge_user_bridges')
			->addOptionalRelation('blueprint_id', 'blueprints')
			->save();
	}

}
