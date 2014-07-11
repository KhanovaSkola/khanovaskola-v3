<?php

namespace Bin\Commands;

use App\Models\Services\Queue;
use App\Models\Tasks\Task;
use Exception;
use Monolog\Logger;
use Nette\DI\Container;
use Tracy\Debugger;


class Worker extends Command
{

	protected function configure()
	{
		$this->setName('worker')
			->setDescription('Queue worker (should be run with supervisord)');
	}

	public function invoke(Queue $queue, Logger $logger, Container $container)
	{
		$this->out->writeln('<info>Worker is running...</info>');
		while (TRUE)
		{
			$queue->watch(function(Task $task, callable $next) use ($queue, $logger, $container) {
				$class = get_class($task);
				$this->out->writeln($class);
				$logger->addInfo("Running task $class");

				$task->setOutput($this->out);
				try
				{
					$container->callMethod([$task, 'run']);
				}
				catch (Exception $e)
				{
					$this->out->writeln("<error>Task $class, see:</error>");
					Debugger::log($e);
				}
				finally
				{
					$next();
				}
			});
		}
	}

}
