<?php

namespace App\Models\Services;

use App\ImplementationException;
use App\InvalidStateException;
use App\Models\Tasks\Task;
use Nette\Object;
use Pheanstalk\Connection;
use Pheanstalk\Pheanstalk;


class Queue extends Object
{

	/**
	 * @var Pheanstalk
	 */
	private $stalk;

	/**
	 * @var string url
	 */
	private $host;

	public function __construct($host)
	{
		$this->stalk = new Pheanstalk($host);
		$this->host = $host;
	}

	protected function assertConnected()
	{
		/** @var Connection $conn */
		$conn = $this->stalk->getConnection();
		if (!$conn->isServiceListening())
		{
			throw new InvalidStateException("Beanstalkd is not running on '$this->host'");
		}
	}

	public function enqueue(Task $task)
	{
		$this->assertConnected();

		if (!method_exists($task, 'run'))
		{
			$class = get_class($task);
			throw new ImplementationException("Task '$class' does not implement method 'run'.");
		}

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

}
