<?php

namespace App\Models\Rme;


/**
 * @property int     $duration  seconds
 * @property string  $preview   absolute url
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
		if (!$data)
		{
			return $data;
		}

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
		return $this->getValue('duration') ?: 20 * 60;
	}

}
