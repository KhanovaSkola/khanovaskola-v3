<?php

namespace App\Services;

use App\DeprecatedException;
use Elasticsearch\Client;
use Elasticsearch\Common\Exceptions\BadRequest400Exception;
use Elasticsearch\Common\Exceptions\Missing404Exception;
use Mikulas\Diagnostics\ElasticSearchPanel;
use Nette\Utils\Json;
use Nette\Utils\Neon;


class ElasticSearch extends Client
{

	const INDEX = 'khanovaskola';
	const MIN_SCORE = 0.05;

	const HIGHLIGHT_START = '{{%highlight%}}';
	const HIGHLIGHT_END = '{{%/highlight%}}';

	/** @var ElasticSearchPanel */
	protected $panel;

	/** @var string path */
	private $appDir;

	public function __construct(array $params, ElasticSearchPanel $panel, $appDir)
	{
		parent::__construct($params);

		$this->panel = $panel;
		$this->appDir = $appDir;
	}

	/**
	 * @inheritdoc
	 */
	public function search($params = [])
	{
		$res = parent::search($params);
		$this->panel->onSearch($res, $params);
		return $res;
	}

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
			'index' => self::INDEX,
			'type' => $type,
			'id' => $id,
			'body' => $data,
		]);
	}

	public function addMapping($type, array $fields)
	{
		$args = [
			'index' => self::INDEX,
			'type' => $type,
			'body' => [
				'properties' => $fields,
			]
		];
		$this->indices()->putMapping($args);
	}

	public function fulltextSearch($type, $query, array $in = NULL)
	{
		if (!$in)
		{
			$in = '_all';
		}
		$args = [
			'index' => self::INDEX,
			'type' => $type,
			'body' => [
				'fields' => ['id'],
				'min_score' => self::MIN_SCORE,
				'query' => [
					'multi_match' => [
						'query' => $query,
						'fields' => $in,
					]
				],
				'highlight' => [
					'pre_tags' => [self::HIGHLIGHT_START],
					'post_tags' => [self::HIGHLIGHT_END],
					'fields' => [
						'title' => ['number_of_fragments' => 0],
						'description' => ['number_of_fragments' => 0],
						'subtitles' => ['number_of_fragments' => 3],
					]
				],
			]
		];

		return $this->search($args);
	}

	/**
	 * Drops index if exists, DROPS ALL DATA
	 */
	public function setupIndices()
	{
		$conf = file_get_contents($this->appDir . '/config/elasticsearch.neon');
		$args = Neon::decode($conf);
		try
		{
			$this->indices()->delete([
				'index' => self::INDEX,
			]);
		}
		catch (Missing404Exception $e)
		{
			// ok, nothing to delete
		}

		$this->indices()->create([
			'index' => self::INDEX,
			'body' => $args
		]);
	}

}
