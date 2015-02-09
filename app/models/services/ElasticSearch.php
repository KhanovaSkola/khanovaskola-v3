<?php

namespace App\Models\Services;

use App\DeprecatedException;
use Elasticsearch\Client;
use Elasticsearch\Common\Exceptions\Missing404Exception;
use Mikulas\Diagnostics\ElasticSearchLogger;
use Nette\Neon\Neon;


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

	public function __construct(array $params, $appDir)
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

	public function update($args)
	{
		throw new DeprecatedException('Use updateDoc or updateScript instead');
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
		$conf = file_get_contents($this->appDir . '/config/elasticsearch.neon');
		$args = Neon::decode($conf);

		$confSynonyms = file_get_contents($this->appDir . '/config/synonyms.compiled.neon');
		$synonyms = Neon::decode($confSynonyms);

		$args['settings']['analysis']['filter']['synonyms']['synonyms'] = $synonyms;

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
	 * List of Czech stopwords from Lucene 3.0.1
	 * @see http://www.docjar.com/html/api/org/apache/lucene/analysis/cz/CzechAnalyzer.java.html
	 * @return array
	 */
	public static function getStopwords()
	{
		return ['a', 's', 'k', 'o', 'i', 'u', 'v', 'z', 'dnes', 'cz', 'tímto', 'budeš', 'budem',
			'byli', 'jseš', 'můj', 'svým', 'ta', 'tomto', 'tohle', 'tuto', 'tyto',
			'jej', 'zda', 'proč', 'máte', 'tato', 'kam', 'tohoto', 'kdo', 'kteří',
			'mi', 'nám', 'tom', 'tomuto', 'mít', 'nic', 'proto', 'kterou', 'byla',
			'toho', 'protože', 'asi', 'ho', 'naši', 'napište', 're', 'což', 'tím',
			'takže', 'svých', 'její', 'svými', 'jste', 'aj', 'tu', 'tedy', 'teto',
			'bylo', 'kde', 'ke', 'pravé', 'ji', 'nad', 'nejsou', 'či', 'pod', 'téma',
			'mezi', 'přes', 'ty', 'pak', 'vám', 'ani', 'když', 'však', 'neg', 'jsem',
			'tento', 'článku', 'články', 'aby', 'jsme', 'před', 'pta', 'jejich',
			'byl', 'ještě', 'až', 'bez', 'také', 'pouze', 'první', 'vaše', 'která',
			'nás', 'nový', 'tipy', 'pokud', 'může', 'strana', 'jeho', 'své', 'jiné',
			'zprávy', 'nové', 'není', 'vás', 'jen', 'podle', 'zde', 'už', 'být', 'více',
			'bude', 'již', 'než', 'který', 'by', 'které', 'co', 'nebo', 'ten', 'tak',
			'má', 'při', 'od', 'po', 'jsou', 'jak', 'další', 'ale', 'si', 'se', 've',
			'to', 'jako', 'za', 'zpět', 'ze', 'do', 'pro', 'je', 'na', 'atd', 'atp',
			'jakmile', 'přičemž', 'já', 'on', 'ona', 'ono', 'oni', 'ony', 'my', 'vy',
			'jí', 'ji', 'mě', 'mne', 'jemu', 'tomu', 'těm', 'těmu', 'němu', 'němuž',
			'jehož', 'jíž', 'jelikož', 'jež', 'jakož', 'načež', 'právě', 'že'];
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

}
