<?php

namespace Bin\Commands\Migrations;

use App\Migrations\PhpClass;
use Bin\Commands\Command;
use Nette\Database\Context;
use Nette\DI\Container;
use Nextras\Migrations\Drivers\MySqlNetteDbDriver;
use Nextras\Migrations\Engine\Runner;
use Nextras\Migrations\Entities\Group;
use Nextras\Migrations\Extensions;
use Nextras\Migrations\Printers\Console;
use Symfony\Component\Console\Input\InputOption;


class Migrate extends Command
{

	protected function configure()
	{
		$this->setName('migrations:migrate')
			->setDescription('Updates database schema by running all new migrations')
			->addOption('init', 'i', InputOption::VALUE_NONE, 'Create migrations table');
	}

	public function invoke(Container $container, Context $db)
	{
		$driver = new MySqlNetteDbDriver($db, 'migrations');
		$printer = new Console;
		$runner = new Runner($driver, $printer);

		if ($this->in->getOption('init'))
		{
			ob_start();
			$runner->run($runner::MODE_INIT);
			$sql = ob_get_clean();
			$db->query($sql);
			$this->out->writeln('<info>Migrations table created</info>');
			return;
		}

		$g = new Group();
		$g->directory = __DIR__ . '/../../../migrations/struct';
		$g->dependencies = [];
		$g->enabled = TRUE;
		$g->name = 'struct';
		$runner->addGroup($g);
		$runner->addExtensionHandler('sql', new Extensions\NetteDbSql($db));
		$runner->addExtensionHandler('php', new PhpClass([
			'db' => $db,
		], $container));

		try
		{
			$runner->run();
			return;
		}
		catch (\PDOException $e)
		{
			if ($e->getCode() !== '42S02')
			{
				throw $e;
			}

			// lets hope locale is english
			if (!preg_match("~Table '.*?\\.migrations' doesn't exist~", $e->getMessage()))
			{
				throw $e;
			}
			$this->out->writeln('<error>Migrations table does not exist, init migrations first</error>');
		}
	}

}
