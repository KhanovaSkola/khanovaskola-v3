<?php

namespace App\Models\Services;

use HTMLPurifier as Purifier;
use HTMLPurifier_Config as Config;
use Nette\SmartObject;


class HtmlPurifier
{ 
  use SmartObject;

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

		// we are generating dynamic content, cache is never hit
		$config->set('Cache.DefinitionImpl', NULL);
		$config->set('Cache.SerializerPath', NULL);

		return $config;
	}

}
