<?php

namespace Commands\Deploy;

use Commands\Command;
use Nette\Utils\Strings;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Process;


deployer();

class ProductionTask extends Command
{

	const SERVER = 'alpha.khanovaskola.cz';
	const PATH = '/srv/sites/alpha.khanovaskola.cz';

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

		connect(self::SERVER, 'deploy', rsa('~/.ssh/id_rsa'));

		// update commands first
		$this->uploadFromRoot('bin/');

		// we need something to run commands from
		$this->uploadFromRoot('vendor/', '__vendor/');

		$this->uploadFromRoot('migrations/');

		$this->uploadFromRoot('www/_maintenance.php', NULL, TRUE);
		$this->uploadFromRoot('www/index.php', NULL, TRUE);

		// uses __vendor if available
		writeln("\n<fg=blue>Starting maintenance mode</fg=blue>");
		$this->console('maintenance:start');

		ignore(['*/config.local.neon']);
		$this->uploadFromRoot('app/');

		ignore(['*/index.php', '*/_maintenance.php']);
		$this->uploadFromRoot('www/');

		silent();
		writeln("Staging new <info>vendor/</info>");
		run('rm -rf', self::PATH . '/.vendor_unstage/');
		run('mv', self::PATH . '/vendor/', self::PATH . '/.vendor_unstage');
		run('mv', self::PATH . '/__vendor/', self::PATH . '/vendor/');
		silent(FALSE);

		writeln('Running migrations');
		$this->console('db:migrate');

		writeln('Purging cache');
		$this->console('cache:clear');

		// TODO check if config local is set, if not, do not stop maintenance mode

		writeln("<fg=blue>Stopping maintenance mode</fg=blue>\n");
		$this->console('maintenance:stop');

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

	private function uploadFromRoot($dir, $target = NULL, $silent = FALSE)
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

		$root = realpath($this->container->parameters['appDir'] . "/..");
		$query = sprintf('rsync -azP %s %s:%s',
			escapeshellarg("$root/$dir"),
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
