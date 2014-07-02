<?php

namespace App\Models\Services;

use HTMLPurifier as Purifier;
use HTMLPurifier_Config as Config;
use Nette\Object;


class HtmlPurifier extends Object
{

	private $filter;

	public function __construct()
	{
		$this->filter = new Purifier(static::getConfig());
	}

	public function filter($html)
	{
		return $this->filter->purify($html);
	}

	public static function getAllowedElements()
	{
		return ['a', 'b', 'i', 'h3', 'p'];
	}

	public static function getAllowedAttributes()
	{
		return ['a.href'];
	}

	public static function getConfig()
	{
		$config = Config::createDefault();
		$config->set('Core.Encoding', 'UTF-8');
		$config->set('HTML.Doctype', 'HTML 4.01 Transitional');
		$config->set('HTML.AllowedElements', implode(', ', static::getAllowedElements()));
		$config->set('HTML.AllowedAttributes', implode(', ', static::getAllowedAttributes()));
		return $config;
	}

}
