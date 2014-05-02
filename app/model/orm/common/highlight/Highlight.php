<?php

namespace App\Model;

use App\Services\ElasticSearch;
use Nette\Object;


abstract class Highlight extends Object
{

	/** @var Entity */
	private $entity;

	/** @var Highlight[] */
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

	public function getRaw($key)
	{
		return $this->entity->$key;
	}

	/**
	 * @param string $key
	 * @param bool $forceArray
	 * @return NULL|string escaped if highlit
	 */
	public function getHighlit($key, $forceArray = FALSE)
	{
		if (isset($this->highlights[$key]))
		{
			$result = [];
			foreach ($this->highlights[$key] as $unsafe)
			{
				$safe = htmlspecialchars($unsafe);
				$safe = preg_replace(self::$regex, '$1', $safe);
				$safe = str_replace(ElasticSearch::HIGHLIGHT_START, '<em>', $safe);
				$safe = str_replace(ElasticSearch::HIGHLIGHT_END, '</em>', $safe);

				$result[] = $safe;
			}

			if (count($result) === 1 && !$forceArray)
			{
				return $result[0];
			}

			return $result;
		}

		return FALSE;
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
