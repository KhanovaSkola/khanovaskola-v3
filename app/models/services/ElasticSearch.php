<?php

namespace App\Models\Services;

use App\DeprecatedException;
use App\ElasticsearchException;
use App\Models\Services\Locale;
use Elasticsearch\Client;
use Elasticsearch\Common\Exceptions\BadRequest400Exception;
use Elasticsearch\Common\Exceptions\Missing404Exception;
use Mikulas\Diagnostics\ElasticSearchLogger;
use Nette\Neon\Neon;
use Nette\Utils\Json;
use Nette\Utils\Strings;
use Tracy\Debugger;


class ElasticSearch extends Client
{

	const HIGHLIGHT_START = '{{%highlight%}}';
	const HIGHLIGHT_END = '{{%/highlight%}}';

	/**
	 * @var string path
	 */
	private $appDir;

	/**
	 * @var string
	 */
	protected $index;

	/**
	 * @var callable[]
	 */
	public $onEvent;

        /** 
         * @var Locale 
         */
        private $locale;

	public function __construct(array $params, $appDir, Locale $locale)
	{
		$this->index = $params['index'];
		unset($params['index']);

		parent::__construct($params);

		$this->appDir = $appDir;

		$log = $this->params['logObject'];
		if ($log instanceof ElasticSearchLogger)
		{
			$log->injectElasticSearch($this);
		}
                $this->locale = $locale;
	}

	/**
	 * @deprecated
	 * @param $params
	 * @return void
	 */
	public function index($params)
	{
		throw new DeprecatedException('Use addToIndex instead');
	}

	/**
	 * @param string $type entity name
	 * @param int $id entity id
	 * @param array $data
	 * @return array
	 */
	public function addToIndex($type, $id, array $data)
	{
		return parent::index([
			'index' => $this->index,
			'type' => $type,
			'id' => $id,
			'body' => $data,
		]);
	}

	/**
	 * @param string $type entity name
	 * @param array $data [[id => body]]
	 * @return array
	 *
	 * @see http://www.elasticsearch.org/guide/en/elasticsearch/reference/current/docs-bulk.html
	 */
	public function addToIndexBulk($type, array $data)
	{
		$queries = [];
		foreach ($data as $id => $body)
		{
			$queries[] = [
				'index' => [
					'_id' => $id,
				]
			];
			$queries[] = $body;
		}

		$res = parent::bulk([
			'index' => $this->index,
			'type' => $type,
			'body' => $queries,
		]);
		foreach ($res['items'] as $queries)
		{
			foreach ($queries as $query)
			{
				if (isset($query['error']))
				{
					throw new ElasticsearchException($query['error']);
				}
			}
		}

		return $res;
	}

	public function update($args)
	{
		throw new DeprecatedException('Use updateDoc instead');
	}

	public function updateDoc($type, $id, array $data)
	{
		return parent::update([
			'index' => $this->index,
			'type' => $type,
			'id' => $id,
			'body' => [
				'doc' => $data,
			],
		]);
	}

	public function addMapping($type, array $fields)
	{
		$args = [
			'index' => $this->index,
			'type' => $type,
			'body' => [
				'properties' => $fields,
			]
		];
		$this->indices()->putMapping($args);
	}

	/**
	 * Drops index if exists, DROPS ALL DATA
	 */
	public function setupIndices()
	{
    $loc = $this->locale->getLocale();

		$conf = file_get_contents($this->appDir . "/config/elasticsearch.$loc.neon");
		$args = Neon::decode($conf);

		$synonyms_file = $this->appDir . "/config/synonyms.compiled.$loc.neon";

                if (file_exists($synonyms_file)) {
		  $confSynonyms = file_get_contents($this->appDir . "/config/synonyms.compiled.$loc.neon");
		  $synonyms = Neon::decode($confSynonyms);
		  $args['settings']['analysis']['filter']['synonyms']['synonyms'] = $synonyms;
                }

		try
		{
			$this->indices()->delete([
				'index' => $this->index,
			]);
		}
		catch (Missing404Exception $e)
		{
			// ok, nothing to delete
		}

		$this->indices()->create([
			'index' => $this->index,
			'body' => $args
		]);
	}

	/**
	 * Custom list of Czech stopwords based on Lucene 3.0.1
	 * @see http://www.docjar.com/html/api/org/apache/lucene/analysis/cz/CzechAnalyzer.java.html
	 * @return array
	 */
	public static function getStopwords()
	{
		return ['a', 's', 'k', 'o', 'i', 'u', 'v', 'z', 'cz', 'tímto', 'tamtím', 'budeš', 'budem',
			'budou', 'byli', 'jseš', 'můj', 'ta', 'tomto', 'tohle', 'tuto', 'tyto', 'jej', 'zda',
			'máte', 'tato', 'kam', 'tohoto', 'kteří', 'mi', 'nám', 'tom', 'tomuto', 'mít', 'nic',
			'proto', 'kterou', 'byla', 'toho', 'protože', 'asi', 'ho', 'naši', 're', 'což', 'tím',
			'takže', 'svých', 'její', 'svými', 'jste', 'aj', 'tu', 'tedy', 'teto', 'bylo', 'ke',
			'pravé', 'ji', 'nejsou', 'či', 'ty', 'pak', 'vám', 'ani', 'když', 'však', 'neg', 'jsem',
			'tento', 'aby', 'jsme', 'pta', 'jejich', 'byl', 'ještě', 'až', 'také', 'pouze', 'vaše',
			'nás', 'tipy', 'pokud', 'může', 'jeho', 'své', 'jiné', 'zprávy', 'vás', 'jen', 'podle',
			'zde', 'už', 'být', 'více', 'bude', 'již', 'než', 'by', 'co', 'nebo', 'ten', 'tak', 'má',
			'při', 'od', 'po', 'jsou', 'ale', 'si', 'se', 've', 'to', 'jako', 'za', 'zpět', 'ze',
			'do', 'pro', 'je', 'na', 'atd', 'atp', 'jakmile', 'přičemž', 'já', 'on', 'ona', 'ono',
			'oni', 'ony', 'my', 'vy', 'jí', 'ji', 'mě', 'mne', 'jemu', 'tomu', 'těm', 'těmu', 'němu',
			'němuž', 'jehož', 'jíž', 'jelikož', 'jež', 'jakož', 'načež', 'právě', 'že', 'jak'];
	}

	/**
	 * @return string
	 */
	public function getIndex()
	{
		return $this->index;
	}

	public function analyze($analyzer, $query)
	{
		$endpointBuilder = $this->dicEndpoints;

		/** @var \Elasticsearch\Endpoints\Indices\Analyze $endpoint */
		$endpoint = $endpointBuilder('Indices\Analyze');
		$endpoint
			->setIndex($this->getIndex())
			->setBody($query)
			->setParams([
				'analyzer' => $analyzer,
			]);

		$response = $endpoint->performRequest();
		return $response['data'];
	}

	public function search($params = [])
	{
		try
		{
			return parent::search($params);
		}
		catch (BadRequest400Exception $e)
		{
			Debugger::getBlueScreen()->addPanel(function() use ($e) {
				$raw= Json::decode($e->getMessage());
				$match = Strings::match($raw->error, '~Failed to parse source \[(.*?)\]+; nested: (.*?);~is');
				$context = Json::decode($match[1]);
				$error = $match[2];
				dump($error, $context);
			});
			throw $e;
		}
	}

	/**
	 * @deprecated
	 * @param void $params
	 * @return void|array
	 */
	public function delete($params)
	{
		throw new DeprecatedException('Use removeFromIndex instead');
	}

	/**
	 * @param string $type entity name
	 * @param int $id entity id
	 * @return array
	 */
	public function removeFromIndex($type, $id)
	{
		return parent::delete([
			'index' => $this->index,
			'type' => $type,
			'id' => $id,
		]);
	}

}
