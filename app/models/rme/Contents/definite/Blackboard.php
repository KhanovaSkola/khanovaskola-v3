<?php

namespace App\Models\Rme;

use Orm;


class Blackboard extends Content
{

	public function __construct()
	{
		parent::__construct();
		$this->type = 'blackboard';
	}

	/**
	 * @return int seconds
	 */
	public function getDuration()
	{
		// TODO
		return 1;
	}

}
