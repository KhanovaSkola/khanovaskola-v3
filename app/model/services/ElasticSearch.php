<?php

namespace App\Model\Services;

use Elasticsearch\Client;
use Mikulas\Diagnostics\ElasticSearchPanel;


class ElasticSearch extends Client
{

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

}
