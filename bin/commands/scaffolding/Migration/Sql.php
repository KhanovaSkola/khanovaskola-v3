<?php

namespace Bin\Commands\Scaffolding\Migration;

use Bin\Commands\Scaffolding\Command;
use Bin\Services\DoctrineFactory;
use Bin\Services\Scaffolding;
use Bin\Services\SchemaBuilder;
use Doctrine\DBAL\Platforms\MySqlPlatform;
use Doctrine\DBAL\Platforms\PostgreSqlPlatform;
use Doctrine\DBAL\Schema\Comparator;
use SqlFormatter;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;


class Sql extends Command
{

	protected function configure()
	{
		$this->setName('scaffolding:migration:sql')
			->setDescription('Creates new sql migration')
			->addArgument('note', InputArgument::OPTIONAL, 'Migration name')
			->addOption('from-diff', 'd', InputOption::VALUE_NONE, 'Fill migration with changes from RMEs in app');
	}

	public function invoke(Scaffolding $scaffolding, DoctrineFactory $factory, SchemaBuilder $schema)
	{
		$file = $scaffolding->createSqlMigration($this->in->getArgument('note'));

		if ($this->in->getOption('from-diff'))
		{
			$current = $factory->create()->getSchemaManager()->createSchema();
			$target = $schema->create();
			$sqls = Comparator::compareSchemas($current, $target)->toSql(new PostgreSqlPlatform());

			$parts = [];
			foreach ($sqls as $sql)
			{
				if ($sql === 'DROP TABLE migrations')
				{
					continue;
				}
				$sql = SqlFormatter::format("$sql;", FALSE);
				$sql = preg_replace('~[ \t]+$~m', '', $sql);
				$parts[] = $sql;
			}

			file_put_contents($file, implode("\n\n", $parts) . "\n");
		}

		$this->writeCreatedFilesHeader();
		$this->writeCreatedFile($file);
	}

}
