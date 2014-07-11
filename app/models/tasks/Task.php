<?php

namespace App\Models\Tasks;

use Nette\Object;
use Pheanstalk\Job;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Output\OutputInterface;


/**
 * @method run() autowired, implementation checked in Queue::enqueue
 */
abstract class Task extends Object
{

	/**
	 * @var OutputInterface|ConsoleOutput
	 */
	protected $out;

	/**
	 * @var Job
	 */
	private $job;

	public function setJob(Job $job)
	{
		$this->job = $job;
	}

	public function setOutput(OutputInterface $out)
	{
		$this->out = $out;
	}

	public function getJob()
	{
		return $this->job;
	}

}
