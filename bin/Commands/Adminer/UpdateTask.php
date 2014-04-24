<?php

namespace Commands\Adminer;

use Commands\Command;
use Nette\Utils\Strings;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class UpdateTask extends Command
{

	public function setup()
	{
		$this->setDescription('Updates Adminer to most recent version');

	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$file = $this->container->parameters['appDir'] . '/../www/admin/db/index.php';

		$output->writeln("Downloading...");
		$content = file_get_contents('http://adminer.org/latest.php');
		file_put_contents($file, $content);

		$match = [];
		preg_match('~@version (?P<version>.*?)$~m', $content, $match);

		$output->writeln("<info>Adminer updated to version '$match[version]'</info>");
	}

}
