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

	/**
	 * @var int
	 */
	private $total;

	/**
	 * @var string
	 */
	private $didYouMean;

	public function __construct(array $results = [], array $aggregations = [], $total = 0, $didYouMean = '')
	{
		$this->results = $results;
		$this->aggregations = $aggregations;
		$this->total = $total;
		$this->didYouMean = $didYouMean;
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

	/**
	 * @return int
	 */
	public function getTotal()
	{
		return $this->total;
	}

	/**
	 * @return string
	 */
	public function getDidYouMean()
	{
		return $this->didYouMean;
	}

}
