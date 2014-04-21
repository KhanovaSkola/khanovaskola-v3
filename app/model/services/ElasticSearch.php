<?php

namespace App\Services;

use App\DeprecatedException;
use Elasticsearch\Client;
use Mikulas\Diagnostics\ElasticSearchPanel;


class ElasticSearch extends Client
{

	const INDEX = 'khanovaskola';

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

}
