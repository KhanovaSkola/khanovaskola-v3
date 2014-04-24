<?php

namespace Commands\Cache;

use Commands\Command;
use Nette\Utils\Strings;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class ClearTask extends Command
{

	public function setup()
	{
		$this->setDescription('Clear cache and opcache');
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$tmp = $this->container->parameters['tempDir'];
		exec('sudo rm -rf ' . escapeshellarg("$tmp/cache/_*"));
		$output->writeln("<info>Cache cleared</info>");

		file_get_contents('http://vagrant.khanovaskola.cz/tools/opcache/index.php?reset');
		$output->writeln("<info>Opcache cleared</info>");
	}

}
