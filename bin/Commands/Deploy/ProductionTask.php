<?php

namespace Commands\Deploy;

use Commands\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Process;


deployer();

class ProductionTask extends Command
{

	const SERVER = 'dev.khanovaskola.cz';
	const PATH = '/srv/sites/dev.khanovaskola.cz';

	public function setup()
	{
		$this->setDescription('Deploy to production');
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		// if ($this->isHeadDirty())
		// {
		// 	writeln('<error>HEAD is dirty, commit or stash before deploy</error>');
		// 	exit(1);
		// }

		if (!file_exists('/home/vagrant/.ssh/id_rsa'))
		{
			writeln("<error>Deploy keys not found at '~/.ssh/id_rsa'</error>");
			exit(1);
		}

		writeln('Compiling resources for production');
		silent();
		runLocally('grunt dist');
		silent(FALSE);

		connect(self::SERVER, 'deploy', rsa('~/.ssh/id_rsa'));

		silent();
		$newInstallation = !trim(run('ls ' . escapeshellarg(self::PATH) . ' 2>/dev/null'));
		silent(FALSE);

		// update commands first
		$this->uploadFromRoot('bin/');

		// we need something to run commands from
		$this->uploadFromRoot('vendor/', '__vendor/');

		$this->uploadFromRoot('migrations/');

		$this->uploadFromRootSingleFile('www/_maintenance.php', NULL, TRUE);
		$this->uploadFromRootSingleFile('www/index.php', NULL, TRUE);

		// uses __vendor if available
		writeln("\n<fg=blue>Starting maintenance mode</fg=blue>");
		$this->console('maintenance:start');

		$this->uploadFromRoot('app/', NULL, FALSE, ['config.local.neon']);
		$this->uploadFromRoot('www/', NULL, FALSE, ['index.php', '_maintenance.php']);

		silent();
		writeln('Staging new <info>vendor/</info>');
		run('rm -rf', self::PATH . '/.vendor_unstage/');
		run('mv', self::PATH . '/vendor/', self::PATH . '/.vendor_unstage');
		run('mv', self::PATH . '/__vendor/', self::PATH . '/vendor/');
		silent(FALSE);

		writeln('Running migrations');
		$this->console('db:migrate');

		// TODO check if config local is set, if not, do not stop maintenance mode

		if ($newInstallation)
		{
			run('mkdir', self::PATH . '/temp');
			run('mkdir', self::PATH . '/temp/cache');
			run('mkdir', self::PATH . '/log');

			writeln("<info>Initial deploy complete, add 'config.local.neon'</info>");
			writeln('<info>and then disable maintenance mode manually.</info>');
		}
		else
		{
			writeln('Purging cache');
			$this->console('cache:clear');

			writeln("<fg=blue>Stopping maintenance mode</fg=blue>\n");
			$this->console('maintenance:stop');
		}

		$time = date('r');

		writeln('Tagging head as deploy/production');
		silent();
		runLocally("git tag -f -a deploy/production -m 'Deployed at $time'");
		silent(FALSE);
	}

	private function isHeadDirty()
	{
		$output = [];
		exec('git diff --shortstat 2> /dev/null | tail -n1', $output);
		return count($output);
	}

	private function lockFileSame()
	{
		silent();
		$remote = run('md5sum', self::PATH . '/composer.lock');
		$localPath = escapeshellarg(__DIR__ . '/../composer.lock');
		$local = runLocally("cat $localPath | md5");
		silent(FALSE);

		return substr($remote, 0, 32) === substr($local, 0, 32);
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

	private function uploadFromRoot($dir, $target = NULL, $silent = FALSE, array $exclude = [])
	{
		if ($target === NULL)
		{
			$target = $dir;
			if (!$silent) writeln("Uploading <info>$dir</info>");
		}
		else
		{
			if (!$silent) writeln("Uploading <info>$dir</info> to <info>$target</info>");
		}
		$target = self::PATH . "/$target";

		silent();
		run('mkdir -p ' . escapeshellarg($target));
		silent(FALSE);

		$root = realpath($this->container->parameters['appDir'] . '/..');

		$excludeStr = '';
		foreach ($exclude as $ex)
		{
			$excludeStr .= ' --exclude=' . escapeshellarg($ex);
		}
		$query = sprintf('rsync -azP %s %s %s:%s',
			escapeshellarg("$root/$dir"),
			$excludeStr,
			escapeshellarg('deploy@' . self::SERVER),
			escapeshellarg($target)
		);

		$process = new Process($query);
		$process->run(function($type, $buffer) {
			$match = [];
			if (preg_match('~to-check=(\d+)/(\d+)~', $buffer, $match))
			{
				$this->printProgress($match[2] - $match[1], $match[2]);
			}
		});
		echo "\r" . str_repeat(' ', 50) . "\r";
	}

	private function uploadFromRootSingleFile($file, $target = NULL, $silent = FALSE)
	{
		if ($target === NULL)
		{
			$target = $file;
			if (!$silent) writeln("Uploading <info>$file</info>");
		}
		else
		{
			if (!$silent) writeln("Uploading <info>$file</info> to <info>$target</info>");
		}
		$target = self::PATH . "/$target";

		$root = realpath($this->container->parameters['appDir'] . '/..');

		$query = sprintf('rsync -avz %s %s:%s',
			escapeshellarg("$root/$file"),
			escapeshellarg('deploy@' . self::SERVER),
			escapeshellarg($target)
		);

		$process = new Process($query);
		$process->run();
	}

	private function console(/* ... */)
	{
		silent();
		$args = func_get_args();
		array_unshift($args, self::PATH . '/bin/console');
		array_unshift($args, 'php');
		$res = call_user_func_array('run', $args);
		silent(FALSE);
		return $res;
	}

	private function migrations($command)
	{
		silent();
		$res = call_user_func('run', escapeshellarg(self::PATH . '/bin/console db:migrate') . ' ' . $command);
		silent(FALSE);
		return $res;
	}

}
