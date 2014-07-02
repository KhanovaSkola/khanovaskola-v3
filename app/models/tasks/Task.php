<?php

namespace App\Models\Tasks;

use Nette\DI\Container;
use Nette\Object;
use Pheanstalk_Job as Job;


abstract class Task extends Object
{

	/** @var Job */
	private $job;

	abstract public function run(Container $container);

	public function setJob(Job $job)
	{
		$this->job = $job;
	}

	public function getJob()
	{
		return $this->job;
	}

}
