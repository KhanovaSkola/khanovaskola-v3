<?php

namespace App\Models\Services;

use App\Models\Structs\Gender;
use Mikulas\Morphodita\Client;
use Nette\Caching\Cache;
use Nette\Caching\IStorage;


class Inflection
{

	const NOMINATIVE = 1;
	const GENITIVE = 2;
	const DATIVE = 3;
	const ACCUSATIVE = 4;
	const VOCATIVE = 5;
	const LOCATIVE = 6;
	const INSTRUMENTAL = 7;

	/**
	 * @var Cache
	 */
	private $cache;

	/**
	 * @var Client
	 */
	private $morph;

	public function __construct(IStorage $storage, Client $morph)
	{
		$this->cache = new Cache($storage, 'inflection');
		$this->morph = $morph;
	}

	/**
	 * @param string $phrase
	 * @param int $case
	 * @return string inflected
	 */
	public function inflect($phrase, $case)
	{
		$tagged = $this->morph->tag($phrase);
		$words = $this->flatten($tagged);

		$lemmas = [];
		foreach ($words as $word)
		{
			$lemmas[] = [
				$word['lemma'],
				$this->changeTagCase($word['tag'], 1, $case)
			];
		}

		$generated = $this->morph->generate($lemmas);

		$output = '';
		foreach ($words as $i => $word)
		{
			$output .= isset($generated[$i]['form']) ? $generated[$i]['form'] : $word['token'];
			if (isset($word['space']))
			{
				$output .= $word['space'];
			}
		}

		return $this->fixCapitalization($output, $phrase);
	}

	private function changeTagCase($tag, $from, $to)
	{
		if ($tag[4] == $from)
		{
			$tag[4] = $to;
		}
		return $tag;
	}

	private function fixCapitalization($phrase, $template)
	{
		$split = '~(\s+|\.)~u';
		$phraseParts = preg_split($split, $phrase, NULL, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
		$templateParts = preg_split($split, $template, NULL, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
		if (count($phraseParts) !== count($templateParts))
		{
			// template has different words than phrase
			return $phrase;
		}
		foreach ($phraseParts as $i => &$part)
		{
			$upperWord = $templateParts[$i] == mb_convert_case($templateParts[$i], MB_CASE_UPPER);
			if ($upperWord) // eg. USA
			{
				$part = mb_convert_case($part, MB_CASE_UPPER);
				continue;
			}

			$first = mb_substr($templateParts[$i], 0, 1);
			$upperFirst = $first == mb_convert_case($first, MB_CASE_UPPER);
			if ($upperFirst)
			{
				$part = mb_convert_case($part, MB_CASE_TITLE); // hopefully will work like ucFirst
			}
		}

		return implode('', $phraseParts);
	}

	private function flatten(array $sentences)
	{
		$words = [];
		foreach ($sentences as $sentence)
		{
			foreach ($sentence as $word)
			{
				$words[] = $word;
			}
		}

		return $words;
	}

	/**
	 * @param string $phrase
	 * @return string gender
	 */
	public function gender($phrase)
	{
		return $this->cache->load($phrase, function() use ($phrase) {
			if (!trim($phrase))
			{
				return Gender::MALE;
			}

			$tagged = $this->flatten($this->morph->tag($phrase));

			$points = [
				'male' => 0,
				'female' => 0,
			];

			foreach ($tagged as $word)
			{
				switch ($word['tag'][2]) {
					case 'F': // femininum (ženský rod)
					case 'H': // femininum nebo neutrum (tedy nikoli maskulinum)
					case 'Q': // femininum singuláru nebo neutrum plurálu
						$points['female']++;
						continue;
					case 'I': // maskulinum inanimatum (rod mužský neživotný)
					case 'M': // maskulinum animatum (rod mužský životný)
					case 'Y': // masculinum (animatum nebo inanimatum)
					case 'Z': // nikoli femininum
						$points['male']++;
						continue;
				}
			}

			return $points['female'] >= $points['male'] ? Gender::FEMALE : Gender::MALE;
		});
	}

}
