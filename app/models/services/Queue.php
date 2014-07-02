<?php

namespace App\Models\Services;

use App\InvalidStateException;
use App\Tasks\Task;
use Nette\Object;
use Pheanstalk_Connection;
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
		/** @var Pheanstalk_Connection $conn */
		$conn = $this->stalk->getConnection();
		if (!$conn->isServiceListening())
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

		/** @var Task $task */
		$task = unserialize($job->getData());
		$task->setJob($job);

		$cb($task, function() use ($job) {
			$this->stalk->delete($job);
		}, $job);
	}

	/**
	 * Remove (presumably failing) task from queue
	 * @param Task $task
	 */
	public function buryTask(Task $task)
	{
		$this->stalk->bury($task->getJob());
	}

}
