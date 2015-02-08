<?php

namespace Bin\Commands\ElasticSearch;

use App\Models\Services\ElasticSearch;
use Bin\Commands\Command;
use Symfony\Component\Console\Input\InputArgument;


class Analyzer extends Command
{

	protected function configure()
	{
		$this
			->setName('elasticsearch:analyzer')
			->setAliases(['es:analyzer'])
			->addArgument('analyzer', InputArgument::REQUIRED)
			->addArgument('query', InputArgument::REQUIRED)
			->setDescription('Test analyzer output');
	}

	public function invoke(ElasticSearch $elastic)
	{
		$res = $elastic->analyze($this->in->getArgument('analyzer'), $this->in->getArgument('query'));
		foreach ($res['tokens'] as $token)
		{
			$this->out->writeln("$token[type] $token[token]");
		}
	}

}
