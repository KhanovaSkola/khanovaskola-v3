<?php

namespace App\Services;

use App\DeprecatedException;
use Elasticsearch\Client;
use Mikulas\Diagnostics\ElasticSearchPanel;


class ElasticSearch extends Client
{

	const INDEX = 'khanovaskola';
	const MIN_SCORE = 0.05;

	const HIGHLIGHT_START = '{{%highlight%}}';
	const HIGHLIGHT_END = '{{%/highlight%}}';

	/** @var ElasticSearchPanel */
	protected $panel;

	public function __construct(array $params, ElasticSearchPanel $panel)
	{
		parent::__construct($params);

		$this->panel = $panel;
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
		$args = [
			'index' => self::INDEX,
			'type' => $type,
			'body' => [
				'fields' => ['id'],
				'min_score' => self::MIN_SCORE,
				'query' => [
					'fuzzy_like_this' => [
						'like_text' => $query,
						'fields' => ['title', 'description', 'subtitles'],
					],
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

}
