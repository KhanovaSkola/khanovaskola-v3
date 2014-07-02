<?php

namespace Bin\Commands\Scaffolding;

use Bin\Commands;


class Command extends Commands\Command
{

	protected function writeCreatedFile($file)
	{
		$this->out->writeln('  ' . $this->formatPath($file));
	}

	protected function writeCreatedFilesHeader()
	{
		$this->out->writeln('<info>Created files:</info>');
	}

	private function formatPath($path)
	{
		$root = realpath(__DIR__ . '/../../../');
		$path = realpath($path);
		$relative = substr($path, strlen($root) + 1);
		return preg_replace('~/([a-z0-9-]+)(\.[a-z0-9]+)?$~ims', '/<fg=blue>$1</fg=blue>$2', $relative);
	}

}
