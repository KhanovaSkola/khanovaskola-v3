<?php

namespace App\Model;

use App\Services\ElasticSearch;
use Nette\Object;


class Highlight extends Object
{

	/** @var Entity */
	private $entity;

	/** @var array */
	private $highlights;

	/** @var string precompiled */
	private static $regex;

	public function __construct(Entity $entity, array $highlights)
	{
		$this->entity = $entity;
		$this->highlights = $highlights;

		if (!self::$regex)
		{
			self::$regex = $this->buildRegex();
		}
	}

	public function &__get($name)
	{
		$res = $this->getHighlit($name);
		return $res;
	}

	/**
	 * @param string $key
	 * @return string escaped
	 */
	public function getHighlit($key)
	{
		if (isset($this->highlights[$key]))
		{
			$result = [];
			foreach ($this->highlights[$key] as $unsafe)
			{
				// One fragment, probably with whole field
				// enforced by number_of_fragments: 0
				$safe = htmlspecialchars($unsafe);
				$safe = preg_replace(self::$regex, '$1', $safe);
				$safe = str_replace(ElasticSearch::HIGHLIGHT_START, '<em>', $safe);
				$safe = str_replace(ElasticSearch::HIGHLIGHT_END, '</em>', $safe);
				$result[] = $safe;
			}

			if (count($result) === 1)
			{
				return $result[0];
			}
			return implode('<br>', $result);
		}

		return htmlspecialchars($this->entity->$key);
	}

	private static function buildRegex()
	{
		$words = ['']; // empty word to merge immediate tokens
		foreach (ElasticSearch::getStopwords() as $word)
		{
			$words[] = preg_quote($word, '~');
		}
		return '~' .
			preg_quote(ElasticSearch::HIGHLIGHT_END, '~') .
			'(\W*\s*(' . implode('|', $words) . ')\s*\W*)' .
			preg_quote(ElasticSearch::HIGHLIGHT_START, '~') .
			'~';
	}

}
