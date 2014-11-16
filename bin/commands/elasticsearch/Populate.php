<?php

namespace Bin\Commands\ElasticSearch;

use Bin\Commands\Command;
use Bin\Services\ElasticPopulator;
use Commands\IMightLoseData;


class Populate extends Command implements IMightLoseData
{

	protected function configure()
	{
		$this
			->setName('elasticsearch:populate')
			->setAliases(['es:populate'])
			->setDescription('Reindex all data from rel db');
	}

	public function invoke(ElasticPopulator $populator)
	{
		$rows = $populator->populate();
		$this->out->writeln("<info>Reindexed $rows rows</info>");
	}

}
