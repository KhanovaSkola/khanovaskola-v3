<?php

namespace App\Models\Rme;


class Blackboard extends Content
{

	public function __construct()
	{
		parent::__construct();
		$this->type = 'blackboard';
	}

	public function getIndexData()
	{
		$data = parent::getIndexData();
		// This is intentionally set to video so search
		// does not differentiate those recordings
		$data['bucket'] = 'video';
		return $data;
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
