<?php

namespace Bin\Commands\ElasticSearch;

use App\Models\Services\ElasticSearch;
use App\Models\Services\Paths;
use Bin\Commands\Command;


class BuildSynonyms extends Command
{

	protected function configure()
	{
		$this
			->setName('elasticsearch:build-synonyms')
			->setAliases(['es:synonyms', 'es:build-synonyms'])
			->setDescription('Compile synonyms.esn to elasticsearch.synonyms.neon');
	}

	public function invoke(ElasticSearch $elastic, Paths $paths)
	{
		$raw = file_get_contents($paths->getApp() . '/config/synonyms.esn');
		$output = [];
		foreach (explode("\n", $raw) as $line)
		{
			if (!$line || strpos($line, '#') === 0)
			{
				continue;
			}

			$parts = preg_split('~\s*(=>|,)\s*~', $line, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
			foreach ($parts as &$part)
			{
				if ($part === '=>' || $part === ',')
				{
					continue;
				}
				$words = [];
				foreach ($elastic->analyze('synonyms_compiler', $part)['tokens'] as $token)
				{
					$words[] = $token['token'];
				}
				$part = implode(' ', $words);
			}
			$output[] = '- "' . implode(' ', $parts) . '"';
		}

		$content = "# Do not edit this file directly! Instead,\n";
		$content .= "# edit synonyms.esn and run elasticsearch:build-synonyms command.\n\n";
		$content .= str_replace(' ,', ',', implode("\n", $output)) . "\n";
		file_put_contents($paths->getApp() . '/config/synonyms.compiled.neon', $content);

		$this->out->writeln('<info>Synonyms compiled</info>');
	}

}
