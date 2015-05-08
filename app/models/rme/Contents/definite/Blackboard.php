<?php

namespace App\Models\Rme;


/**
 * @property NULL|int     $duration  seconds
 * @property NULL|string  $preview   absolute url
 */
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
