<?php

namespace App\Models\Tasks;

use App\Models\Orm\RepositoryContainer;
use App\Models\Rme\BlockSchemaBridge;
use App\Models\Rme\Schema;
use App\Models\Structs\EntityPointer;


class UpdateSchema extends Task
{

	/**
	 * @var EntityPointer to Schema
	 */
	private $pSchema;

	public function __construct(Schema $schema)
	{
		$this->pSchema = new EntityPointer($schema);
	}


	public function run(RepositoryContainer $orm)
	{
		/** @var Schema $schema */
		$schema = $this->pSchema->resolve($orm);

		$bridges = [];
		$position = 0;
		for ($row = 0; $row < 1000; $row++)
		{
			foreach ([0, 2, 4] as $col)
			{
				if (!array_key_exists($row, $schema->layout[$col]))
				{
					break 2;
				}

				$cell = $schema->layout[$col][$row];
				if ($cell && !is_array($cell))
				{
					$bridge = new BlockSchemaBridge();
					$bridge->schema = $schema;
					$bridge->position = $position++;
					$bridge->block = $orm->blocks->getById($cell);
					$bridges[] = $bridge;
				}
			}
		}
		$schema->blockSchemaBridges = $bridges;

		$orm->flush();
	}

}
