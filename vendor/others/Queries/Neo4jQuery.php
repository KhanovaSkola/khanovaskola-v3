<?php

namespace Mikulas\Tracy\QueryPanel;

use Everyman\Neo4j\Query;
use Everyman\Neo4j\Query\ResultSet;
use Everyman\Neo4j\Transport;
use Nette\Object;
use Nette\Utils\Html;
use Tracy\Dumper;
use Tracy\QueryPanel\IQuery;


class Neo4jQuery extends Object implements IQuery
{

	/** @var Query */
	private $command;

	/** @var ResultSet */
	private $result;

	/** @var Transport */
	private $transport;

	public function __construct($command, $result, $transport)
	{
		$this->command = $command;
		$this->result = $result;
		$this->transport = $transport;
	}

	/**
	 * @return int
	 */
	public function getResultCount()
	{
		return $this->result->count();
	}

	/**
	 * @return Html|string
	 */
	public function getResult()
	{
		$html = Dumper::toHtml($this->result, [
			Dumper::COLLAPSE => TRUE,
		]);
		return Html::el()->setHtml($html);
	}

	/**
	 * Arbitrary identifier such as mysql, postgres, elastic, neo4j
	 *
	 * @return string
	 */
	public function getStorageType()
	{
		return 'neo4j';
	}

	/**
	 * Database, fulltext index or similar, NULL if not applicable
	 *
	 * @return NULL|string
	 */
	public function getDatabaseName()
	{
		return NULL;
	}

	/**
	 * @return Html|string
	 */
	public function getQuery()
	{
		$hack = Access($this->command);
		/** @var Query $query */
		$query = $hack->query;
		$html = $this->formatQuery($query->getQuery());
		return Html::el()->setHtml($html);
	}

	private function formatQuery($query)
	{
		$query = preg_replace('~^\s+~m', '', $query);

		$query = preg_replace('~\b(AS|ASSERT|CONSTRAINT|CREATE|DELETE|DROP|FOREACH|IS|LIMIT|(OPTIONAL\s+)?MATCH|MERGE|MATCH|ON|ORDER BY|REMOVE|RETURN|SET|SKIP|UNIQUE|WHERE|WITH)\b~',
			'<strong style="color: blue">$0</strong>', $query);

		return "<pre>$query</pre>";
	}

	/**
	 * @return NULL|float ms
	 */
	public function getElapsedTime()
	{
		$hack = Access($this->transport);
		return curl_getinfo($hack->handle, CURLINFO_TOTAL_TIME) * 1000;
	}

	/**
	 * e.g. SQL explain
	 *
	 * @return NULL|Html|string
	 */
	public function getInfo()
	{
		// TODO print arguments
	}

}
