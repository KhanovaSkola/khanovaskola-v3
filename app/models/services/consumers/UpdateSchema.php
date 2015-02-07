<?php

namespace App\Models\Services\Consumers;

use App\Models\Rme\BlockSchemaBridge;
use App\Models\Rme\Schema;


class UpdateSchema extends Consumer
{

	public function invoke(array $args)
	{
		/** @var Schema $schema */
		$schema = $args['schema'];

		$bridges = [];
		$position = 0;
		for ($row = 0; $row < 1000; $row++)
		{
			foreach ([0, 2, 4] as $col)
			{
				if (!isset($schema->layout[$col]) || !array_key_exists($row, $schema->layout[$col]))
				{
					break 2;
				}

				$cell = $schema->layout[$col][$row];
				if ($cell && !is_array($cell))
				{
					$bridge = new BlockSchemaBridge();
					$bridge->schema = $schema;
					$bridge->position = $position++;
					$bridge->block = $this->orm->blocks->getById($cell);
					$bridges[] = $bridge;
				}
			}
		}
		$schema->blockSchemaBridges = $bridges;

		$this->orm->flush();
	}
}
