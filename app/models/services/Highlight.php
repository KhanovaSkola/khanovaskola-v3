<?php

namespace App\Models\Services;

use Nette\Object;


class Highlight extends Object
{

	const START = '{{%highlight%}}';
	const END = '{{%/highlight%}}';

	/**
	 * @var string precompiled
	 */
	private static $regex;

	private static function getRegex()
	{
		if (!self::$regex)
		{
			$words = ['']; // empty word to merge immediate tokens
			foreach (ElasticSearch::getStopwords() as $word)
			{
				$words[] = preg_quote($word, '~');
			}

			self::$regex = '~' .
				preg_quote(self::END, '~') .
				'(\W*\s*(' . implode('|', $words) . ')\s*\W*)' .
				preg_quote(self::START, '~') .
				'~';
		}

		return self::$regex;
	}

	/**
	 * @param string $unsafe
	 * @param string $start opening html tag
	 * @param string $end closing html tag
	 * @param bool $noescape
	 * @return string safe html
	 */
	public static function process($unsafe, $start = '<strong>', $end = '</strong>', $noescape = FALSE)
	{
		$safe = $noescape ? $unsafe : htmlspecialchars($unsafe);
		$safe = preg_replace(self::getRegex(), '$1', $safe);
		$safe = str_replace(self::START, $start, $safe);
		$safe = str_replace(self::END, $end, $safe);

		return $safe;
	}

}
