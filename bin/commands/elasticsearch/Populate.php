<?php

namespace Bin\Commands\ElasticSearch;

use Bin\Commands\Command;
use Bin\Services\ElasticPopulator;
use Commands\IMightLoseData;
use Symfony\Component\Console\Helper\ProgressBar;


class Populate extends Command implements IMightLoseData
{

	/**
	 * @var ProgressBar
	 */
	protected $bar;

	protected function configure()
	{
		$this
			->setName('elasticsearch:populate')
			->setAliases(['es:populate'])
			->setDescription('Reindex all data from rel db');
	}

	public function invoke(ElasticPopulator $populator)
	{
		$begin = function($total) {
			$this->bar = new ProgressBar($this->out, $total);
			$this->bar->start();
		};
		$tick = function() {
			$this->bar->advance();
		};

		$rows = $populator->populate($begin, $tick);
		$this->bar->finish();
		$this->out->write("\n");

		$this->out->writeln("<info>Reindexed $rows rows</info>");
	}

}
