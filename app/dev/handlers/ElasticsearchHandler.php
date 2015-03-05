<?php

namespace App\Dev\Handlers;

use Elasticsearch\Client as Elasticsearch;
use Nette\Utils\Html;
use Nette\Utils\Json;
use Nette\Utils\JsonException;
use Nextras\TracyQueryPanel\IQuery;
use Nextras\TracyQueryPanel\QueryPanel;
use Tracy\Dumper;


class ElasticsearchHandler implements IQuery
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
		try
		{
			$this->request = Json::decode($request, JSON_OBJECT_AS_ARRAY);
			$this->response = Json::decode($response, JSON_OBJECT_AS_ARRAY);
		}
		catch (JsonException $e)
		{
			// bulk request
		}
	}

	public static function register(Elasticsearch $es, QueryPanel $panel)
	{
		$request = NULL;
		$es->onEvent[] = function($message, $content) use ($panel, &$request) {
			if ($message === 'Request Body')
			{
				$request = $content[0];
				return;
			}
			if ($request && $message === 'Response')
			{
				$panel->addQuery(new static($request, $content[0]));
				$request = NULL;
			}
		};
	}

	/**
	 * Suggested behavior: print Tracy\Dumper::toHtml() array
	 * of returned rows so row count is immediately visible.
	 *
	 * @return Html|string
	 */
	public function getResult()
	{
		if (!isset($this->response['hits']['hits']))
		{
			return NULL;
		}

		$html = Dumper::toHtml($this->response['hits']['hits'], [
			Dumper::COLLAPSE => TRUE,
			Dumper::TRUNCATE => 50,
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
		return 'elastic';
	}

	/**
	 * Database name, fulltext index or similar, NULL if not applicable
	 *
	 * @return NULL|string
	 */
	public function getDatabaseName()
	{
		// TODO: Implement getDatabaseName() method.
	}

	/**
	 * Actual formatted query, e.g. 'SELECT * FROM ...'
	 *
	 * @return Html|string
	 */
	public function getQuery()
	{
		$html = Dumper::toHtml($this->request, [
			Dumper::COLLAPSE_COUNT => 1,
			Dumper::DEPTH => 7,
		]);
		return Html::el()->setHtml($html);
	}

	/**
	 * @return NULL|float ms
	 */
	public function getElapsedTime()
	{
		return isset($this->response['took']) ? $this->response['took'] : NULL;
	}

	/**
	 * e.g. explain
	 *
	 * @return NULL|Html|string
	 */
	public function getInfo()
	{
		$info = $this->response;
		unset($info['hits']['hits']);
		$html = Dumper::toHtml($info, [
			Dumper::COLLAPSE => TRUE,
			Dumper::TRUNCATE => 50,
		]);
		return Html::el()->setHtml($html);
	}

}
