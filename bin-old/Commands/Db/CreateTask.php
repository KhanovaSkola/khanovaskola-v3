<?php

namespace Commands\Db;

use Commands\Command;
use Nette\Utils\Strings;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class CreateTask extends Command
{

	public function setup()
	{
		$this->setDescription('Create new migration');

		$this->addArgument('name', InputArgument::REQUIRED,
			'CamelCase description of what the migration does');
	}

	protected function getFileName($name)
	{
		$name = preg_replace_callback('~[A-Z]~', function($m) {
			return '_' . strToLower($m[0]);
		}, $name);
		return date('YmdHis') . '_' . $name . '.php';
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$dir = $this->container->parameters['appDir'] . '/../migrations';
		$file = "$dir/template.php";

		if (!file_exists($file))
		{
			$output->writeln("<error>Migration template not found at '$file'</error>");
			exit(1);
		}

		$name = $input->getArgument('name');

		$template = file_get_contents($file);
		$template = Strings::replace($template, '~__Example__~', ucFirst($name));

		$out = $this->getFileName($name);
		file_put_contents("$dir/$out", $template);
		$output->writeln("<info>Migration created at '$out'</info>");
	}

}
