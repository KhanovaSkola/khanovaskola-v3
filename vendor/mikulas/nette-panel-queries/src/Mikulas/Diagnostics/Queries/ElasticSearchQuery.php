<?php

namespace Mikulas\Diagnostics\Queries;

use Nette\Diagnostics\Debugger;
use Nette\Diagnostics\Helpers;


class ElasticSearchQuery extends Query
{

	/** @var array */
	private $request;

	/** @var array */
	private $response;

	/**
	 * @param string $request json
	 * @param string $response json
	 */
	public function __construct($request, $response)
	{
		$this->request = json_decode($request);
		$this->response = json_decode($response);
	}

	/**
	 * @return string highlit hmtl
	 */
	public function getQuery()
	{
		if (!property_exists($this->request, 'query'))
		{
			return '<pre>?</pre>';
		}
		// TODO render full query
		$pretty = json_encode($this->request->query, JSON_PRETTY_PRINT);
		// TODO highlight
		return "<pre>$pretty</pre>";
	}

	/**
	 * @return float ms
	 */
	public function getDuration()
	{
		return @$this->response->took;
	}

	/**
	 * @return int|NULL
	 */
	public function getRowCount()
	{
		if (!property_exists($this->response, 'hits'))
		{
			return NULL;
		}
		return $this->response->hits->total;
	}

	/**
	 * User friendly name for Query type
	 * Must be same for the same connection type
	 *
	 * @return string
	 */
	public function getName()
	{
		return 'Elastic';
	}

	/**
	 * @return string hex 00FF00
	 */
	public function getColor()
	{
		return 'A4D4A4';
	}

}
