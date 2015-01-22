<?php

namespace Bin\Commands\Build;

use App\Models\Orm\Mappers\ElasticSearchMapper;
use App\Models\Orm\RepositoryContainer;
use App\Models\Services\Paths;
use Bin\Commands\Command;
use Nette\Utils\Json;


class Js extends Command
{

	protected function configure()
	{
		$this
			->setName('build:js')
			->setDescription('Builds javascript files');
	}

	public function invoke(Paths $paths, RepositoryContainer $orm)
	{
		$file = $paths->getWww() . '/js/app/40-elastic-template.js';

		$pattern = '%query%';
		$fields = ['id', 'title'];

		/** @var ElasticSearchMapper $mapper */
		$mapper = $orm->contents->getMapper();
		$template = $mapper->getQueryTemplate($mapper->getShortEntityName(), $fields, $pattern, 5, 0)['body'];
		unset($template['highlight']);
		unset($template['aggs']);

		$content = "App.getSearchTemplate = function(query) {\n\treturn ";
		$content .= str_replace("\"$pattern\"", 'query', Json::encode($template, Json::PRETTY));
		$content .= ";\n};\n";

		file_put_contents($file, $content);
		$this->out->writeln("<info>Built to $file</info>");
	}

}
