<?php

namespace Commands\Deploy;

use Commands\Command;
use Nette\Utils\Strings;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


deployer();

class ProductionTask extends Command
{

	const SERVER = 'v3.khanovaskola.cz';
	const PATH = '/srv/sites/v3.khanovaskola.cz';

	public function setup()
	{
		$this->setDescription('Deploy to production');
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		// TODO fail if git HEAD is not clean
		connect(self::SERVER, 'mikulas', rsa('~/.ssh/id_rsa'));

		// update commands first
		$this->uploadFromRoot('bin');

		$vendorChanged = !$this->lockFileSame();
		if ($vendorChanged)
		{
			// we need something to run commands from
			$this->uploadFromRoot('vendor', '__vendor');
			$this->uploadFromRoot('composer.lock');
		}

		$this->uploadFromRoot('migrations');

		$this->uploadFromRoot('www/_maintenance.php', NULL, TRUE);
		$this->uploadFromRoot('www/index.php', NULL, TRUE);

		// uses __vendor if available
		writeln("\n<fg=blue>Starting maintenance mode</fg=blue>");
		$this->console('maintenance', 'start');

		ignore(['*/config.local.neon']);
		$this->uploadFromRoot('app');

		ignore(['*/index.php', '*/_maintenance.php']);
		$this->uploadFromRoot('www');
		if ($vendorChanged)
		{
			run('rm -rf', self::PATH . '/vendor');
			run('mv', self::PATH . '/__vendor', self::PATH . '/vendor');
		}

		writeln('Running migrations');
		$this->migrations('migrate');

		writeln('Purging cache');
		// TODO purge cache

		// TODO check if config local is set, if not, do not stop maintenance mode

		// TODO purge opcache

		writeln("<fg=blue>Stopping maintenance mode</fg=blue>\n");
		$this->console('maintenance', 'stop');

		$time = date('r');

		writeln('Tagging head as deploy/production');
		silent();
		runLocally("git tag -f -a deploy/production -m 'Deployed at $time'");
		silent(FALSE);
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
		silent();
		upload(__DIR__ . "/../../../$dir", self::PATH . "/$target");
		silent(FALSE);
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
