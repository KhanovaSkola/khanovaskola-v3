<?php

namespace App\Models\Structs;

use Nette\Object;


class SearchResponse extends Object
{

	/**
	 * @var array
	 */
	private $results;

	/**
	 * @var array
	 */
	private $aggregations;

	public function __construct(array $results = [], array $aggregations = [])
	{
		$this->results = $results;
		$this->aggregations = $aggregations;
	}

	/**
	 * @return array
	 */
	public function getAggregations()
	{
		return $this->aggregations;
	}

	/**
	 * @return array
	 */
	public function getResults()
	{
		return $this->results;
	}

}
