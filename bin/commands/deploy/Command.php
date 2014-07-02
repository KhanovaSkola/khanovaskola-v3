<?php

namespace Bin\Commands\Deploy;

use Bin\Commands;
use Nette\DI\Container;
use Ssh\Authentication\PublicKeyFile;
use Ssh\Configuration;
use Ssh\Session;
use stdClass;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Process\Process;


abstract class Command extends Commands\Command
{

	/** @var Session */
	private $ssh;

	/** @var ConsoleOutput */
	private $output;

	abstract public function getTarget();

	public function invoke(Container $container)
	{
		$params = (object) array_merge([
			'port' => 22,
			'user' => NULL,
		], $container->parameters['deploy'][$this->getTarget()]);

if (FALSE && $this->isHeadDirty())
		{
			$this->out->writeln('<error>HEAD is dirty: commit or stash before deploy</error>');
			exit(1);
		}

		$config = new Configuration($params->host, $params->port);
		$auth = new PublicKeyFile($params->user, '~/shared-ssh/id_rsa.pub', '~/shared-ssh/id_rsa');
		$this->ssh = new Session($config, $auth);

		$this->out->writeln('Compiling resources');
		$this->runLocally('grunt ' . $this->getTarget());

		$this->out->writeln('Connecting to server');
		$newInstallation = !trim($this->runRemotely('ls ' . escapeshellarg($params->path) . ' 2>/dev/null'));

		// update commands first
		$this->uploadFromRoot($params, 'bin/');

		$this->uploadFromRootSingleFile($params, 'www/_maintenance.php', NULL, FALSE);
		$this->uploadFromRootSingleFile($params, 'www/index.php', NULL, FALSE);

		$this->out->writeln("\n<fg=blue>Starting maintenance mode</fg=blue>");
		$this->runRemotely('mv', $params->path . '/www/index.php', $params->path . '/www/_index.php');
		$this->runRemotely('cp', $params->path . '/www/_maintenance.php', $params->path . '/www/index.php');

		$this->uploadFromRoot($params, 'vendor/');
		$this->uploadFromRoot($params, 'migrations/');

		$this->uploadFromRoot('app/', NULL, FALSE, ['config.local.neon']);
		$this->uploadFromRoot('www/', NULL, FALSE, ['index.php', '_maintenance.php']);

		$this->out->writeln('Running migrations');
		$this->runRemotely('php', $params->path . '/www/index.php migration:migrate');

		// TODO check if config local is set, if not, do not stop maintenance mode

		if ($newInstallation)
		{
			$this->runRemotely('mkdir', $params->path . '/temp');
			$this->runRemotely('mkdir', $params->path . '/temp/cache');
			$this->runRemotely('mkdir', $params->path . '/log');

			$this->out->writeln("\n<info>Initial deploy complete, add 'config.local.neon'</info>");
			$this->out->writeln('<info>and then disable maintenance mode manually by</info>');
			$this->out->writeln("<info>copying 'www/_index.php' to 'www/index.php'.</info>");
		}
		else
		{
			$this->out->writeln('Purging cache');
			$this->runRemotely('rm -rf', $params->path . '/temp/cache/*');

			$this->out->writeln("<fg=blue>Stopping maintenance mode</fg=blue>\n");
			$this->runRemotely('cp', $params->path . '/www/_index.php', $params->path . '/www/index.php');
		}

		$this->out->writeln('Tagging head as deploy/production');
		$time = date('r');
		$this->runLocally("git tag -f -a deploy/production -m 'Deployed at $time'");

		$this->out->writeln("\n<info>Deploy successful</info>");
	}

	private function isHeadDirty()
	{
		$output = [];
		exec('git diff --shortstat 2> /dev/null | tail -n1', $output);
		return count($output);
	}

	private function printProgress($n, $outOf)
	{
		echo "\r" . str_repeat(' ', 80) . "\r";
		$len = 30;
		$p = $n / $outOf * $len - 1;
		$fill = str_repeat('=', $p < 0 ? 0 : $p);
		$empty = str_repeat(' ', $len - $n / $outOf * $len);
		echo "[$fill>$empty] $n/$outOf";
	}

	private function uploadFromRoot(stdClass $params, $dir, $target = NULL, $silent = FALSE, array $exclude = [])
	{
		if ($target === NULL)
		{
			$target = $dir;
			if (!$silent) $this->out->writeln("Uploading <info>$dir</info>");
		}
		else
		{
			if (!$silent) $this->out->writeln("Uploading <info>$dir</info> to <info>$target</info>");
		}
		$target = $params->path . "/$target";

		$this->runRemotely('mkdir -p ' . escapeshellarg($target));

		/** @var Container $container */
		$container = $this->getHelper('container')->getContainer();
		$root = realpath($container->parameters['appDir'] . '/..');

		$excludeStr = '';
		foreach ($exclude as $ex)
		{
			$excludeStr .= ' --exclude=' . escapeshellarg($ex);
		}
		$query = sprintf('rsync -azP %s %s %s:%s',
			escapeshellarg("$root/$dir"),
			$excludeStr,
			escapeshellarg($params->user . '@' . $params->host),
			escapeshellarg($target)
		);

		$process = new Process($query);
		$process->setTimeout(NULL);
		$process->run(function($type, $buffer) {
			$match = [];
			if (preg_match('~to-check=(\d+)/(\d+)~', $buffer, $match))
			{
				$this->printProgress($match[2] - $match[1], $match[2]);
			}
		});
		echo "\r" . str_repeat(' ', 50) . "\r";
	}

	private function uploadFromRootSingleFile(stdClass $params, $file, $target = NULL, $silent = FALSE)
	{
		if ($target === NULL)
		{
			$target = $file;
			if (!$silent) $this->out->writeln("Uploading <info>$file</info>");
		}
		else
		{
			if (!$silent) $this->out->writeln("Uploading <info>$file</info> to <info>$target</info>");
		}
		$target = $params->path . "/$target";

		$this->runRemotely('mkdir -p ' . escapeshellarg(dirname($target)));

		/** @var Container $container */
		$container = $this->getHelper('container')->getContainer();
		$root = realpath($container->parameters['appDir'] . '/..');

		$query = sprintf('rsync -avz %s %s:%s',
			escapeshellarg("$root/$file"),
			escapeshellarg($params->user . '@' . $params->host),
			escapeshellarg($target)
		);

		$process = new Process($query);
		$process->run();
	}

	/**
	 * @param string $cmd
	 * @return string
	 */
	private function runLocally($cmd)
	{
		$cmd = $this->createCmd(func_get_args());
		$p = new Process($cmd);
		$p->run();
		return $p->getOutput();
	}

	/**
	 * @param string $cmd
	 * @return string
	 */
	private function runRemotely($cmd)
	{
		$cmd = $this->createCmd(func_get_args());
		return $this->ssh->getExec()->run($cmd);
	}

	private function createCmd(array $args)
	{
		$cmd = array_shift($args); // intentionally not escaped
		foreach ($args as $arg)
		{
			$cmd .= ' ' . escapeshellarg($arg);
		}
		return $cmd;
	}

}
