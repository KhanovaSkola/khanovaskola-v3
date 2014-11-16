<?php

namespace Bin\Commands\ElasticSearch;

use App\Models\Services\ElasticSearch;
use Bin\Commands\Command;
use Commands\IMightLoseData;


class Recreate extends Command implements IMightLoseData
{

	protected function configure()
	{
		$this
			->setName('elasticsearch:recreate')
			->setAliases(['es:recreate'])
			->setDescription('Recreate all elasticsearch indices and mappings (does not repopulate with data)');
	}

	public function invoke(ElasticSearch $es)
	{
		$es->setupIndices();
		$this->out->writeln('<info>Indices recreated</info>');
	}

}
