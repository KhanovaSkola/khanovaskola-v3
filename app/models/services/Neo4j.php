<?php

namespace App\Models\Services;

use Everyman\Neo4j\Cache;
use Everyman\Neo4j\Client;
use Everyman\Neo4j\Command;
use Everyman\Neo4j\Transport;


class Neo4j extends Client
{

	/** @var callable[] (Command, ResultSet) */
	public $onEvent;

	protected function runCommand(Command $command)
	{
		$result = parent::runCommand($command);

		foreach ($this->onEvent as $cb)
		{
			$cb($command, $result);
		}
		return $result;
	}

}
