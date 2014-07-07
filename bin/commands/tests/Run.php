<?php

namespace Bin\Commands\Tests;

use Bin\Commands\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Process\Process;


class Run extends Command
{

	protected function configure()
	{
		$this->setName('tests:run')
			->setDescription('Runs all tests or a certain subgroup')
			->addOption('unit', 'u', InputOption::VALUE_NONE)
			->addOption('cept', 'c', InputOption::VALUE_NONE)
			->addOption('cs', NULL, InputOption::VALUE_NONE);
	}

	public function invoke()
	{
		$root = realpath(__DIR__ . '/../../..');

		$runAll = !$this->in->getOption('unit')
			&& !$this->in->getOption('cept')
			&& !$this->in->getOption('cs');

		if ($runAll || $this->in->getOption('cs'))
		{
			$lattecs = ["$root/vendor/bin/lattecs", "$root/app/templates"];
			if ($r = $this->callSystem($lattecs))
			{
				return $r;
			}

			$phpcs = ["$root/vendor/bin/phpcs", '-p --standard=vendor/mikulas/code-sniffs/cs/' => FALSE, "$root/app"];
			if ($r = $this->callSystem($phpcs))
			{
				return $r;
			}
		}

		if ($runAll || $this->in->getOption('unit'))
		{
			$tester = [
				"$root/vendor/bin/tester",
				'-p', '/usr/bin/php',
				'-c', '/etc/php5/cli',
				'-d', 'extension=curl.so',
				'-d', 'extension=redis.so',
				'-d', 'extension=pgsql.so',
				"$root/tests/cases/unit"];
			if ($r = $this->callSystem($tester))
			{
				return $r;
			}
		}

		if ($runAll || $this->in->getOption('cept'))
		{
			$tester = ['casperjs', 'test', "$root/tests/cases/cept"];
			if ($r = $this->callSystem($tester))
			{
				return $r;
			}
		}

		return 0;
	}

	private function callSystem($args)
	{
		$q = '';
		foreach ($args as $arg => $escape)
		{
			if (is_int($arg))
			{
				$q .= ' ' . escapeshellarg($escape);
			}
			else
			{
				$q .= ' ' . $arg;
			}
		}

		$p = new Process($q);
		$p->run(function($type, $buffer) {
			echo "$buffer";
		});
		return $p->getExitCode();
	}

}
