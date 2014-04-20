<?php

namespace App\Services;

use App\InvalidStateException;
use App\Tasks\Task;
use Nette\Object;
use Pheanstalk_Pheanstalk as Pheanstalk;


class Queue extends Object
{

	/** @var Pheanstalk */
	private $stalk;

	/** @var string url */
	private $host;

	public function __construct($host)
	{
		$this->stalk = new Pheanstalk($host);
		$this->host = $host;
	}

	protected function assertConnected()
	{
		if (!$this->stalk->getConnection()->isServiceListening())
		{
			throw new InvalidStateException("Beanstalkd is not running on '$this->host'");
		}
	}

	public function enqueue(Task $task)
	{
		$this->assertConnected();

		$this->stalk
			->useTube('tasks')
			->put(serialize($task));
	}

	public function watch($cb)
	{
		$this->assertConnected();
		$job = $this->stalk
			->watch('tasks')
			->ignore('default')
			->reserve();

		$task = unserialize($job->getData());

		$cb($task, function() use ($job) {
			$this->stalk->delete($job);
		});
	}

}
