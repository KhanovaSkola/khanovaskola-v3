<?php

namespace Bin\Commands\Adminer;

use Bin\Commands\Command;
use Nette\DI\Container;


class Update extends Command
{

	protected function configure()
	{
		$this
			->setName('adminer:update')
			->setDescription('Updates Adminer to most recent version');
	}

	public function invoke(Container $container)
	{
		$file = $container->parameters['appDir'] . '/../www/tools/db/index.php';

		$this->out->writeln('Downloading...');
		$content = file_get_contents('http://adminer.org/latest.php');
		file_put_contents($file, $content);

		$match = [];
		preg_match('~@version (?P<version>.*?)$~m', $content, $match);

		$this->out->writeln("<info>Adminer updated to version '$match[version]'</info>");
	}

}
