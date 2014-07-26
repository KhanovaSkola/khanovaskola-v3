<?php

namespace Bin\Commands\Schema;

use Bin\Commands\Command;
use Bin\Services\DoctrineFactory;
use Bin\Services\SchemaBuilder;
use Doctrine\DBAL\Platforms\MySqlPlatform;
use Doctrine\DBAL\Platforms\PostgreSqlPlatform;
use Doctrine\DBAL\Schema\Comparator;
use SqlFormatter;


class Diff extends Command
{

	protected function configure()
	{
		$this->setName('schema:diff')
			->setDescription('Prints database schema as deduced from RME');
	}

	public function invoke(DoctrineFactory $factory, SchemaBuilder $schema)
	{
		$current = $factory->create()->getSchemaManager()->createSchema();
		$target = $schema->create();
		$sqls = Comparator::compareSchemas($current, $target)->toSql(new PostgreSqlPlatform());
		foreach ($sqls as $sql)
		{
			if ($sql === 'DROP TABLE migrations')
			{
				continue;
			}
			$this->out->writeln(trim(SqlFormatter::highlight("$sql;")));
		}
	}

}
