<?php

namespace Bin\Commands;

use App\Models\Orm\RepositoryContainer;
use App\Models\Services\Queue;
use App\Models\Tasks\Task;
use Exception;
use Monolog\Logger;
use Nette\DI\Container;
use Tracy\Debugger;


class Worker extends Command
{

	public static $terminationRequested = FALSE;

	protected function configure()
	{
		$this->setName('worker')
			->setDescription('Queue worker (should be run with supervisord)');
	}

	public static function handleSigterm()
	{
		self::$terminationRequested = TRUE;
	}

	public function invoke(Queue $queue, Logger $logger, RepositoryContainer $orm, Container $container)
	{
		pcntl_signal(SIGTERM, [self::class, 'handleSigterm']);

		$this->out->writeln('<info>Worker is running...</info>');
		while (TRUE)
		{
			$queue->watch(function(Task $task, callable $next) use ($queue, $logger, $orm, $container) {
				$orm->purge(); // flush identity map

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
					$file = Debugger::log($e);
					$this->out->writeln("<error>Task $class failed, see '$file'</error>");
				}
				finally
				{
					$next();
				}
			});

			pcntl_signal_dispatch();
			if (self::$terminationRequested)
			{
				exit(0);
			}
		}
	}

}
