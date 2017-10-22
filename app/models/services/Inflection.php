<?php

namespace App\Models\Services;

use App\Models\Structs\Gender;
use Mikulas\Morphodita\Client;
use Nette\Caching\Cache;
use Nette\Caching\IStorage;
use App\Models\Services\Locale;


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

        /** 
         * @var Locale 
         */
        private $locale;


	/** @var string[] word => inflected */
	private $words;

	public function __construct(IStorage $storage, Client $morph, Locale $locale)
	{
		$this->cache = new Cache($storage, 'inflection');
		$this->morph = $morph;
                $this->locale = $locale;
                $lc = $this->locale->getLocale();

                $dict_file = __DIR__."/../../dict.$lc.txt";

                if ( file_exists($dict_file) ) {

		  $lines = explode("\n", file_get_contents($dict_file),-1);

		  foreach ($lines as $line) {

                     //skip lines starting with #
                     if ( strpos(trim($line),"#") != 0 ) {
                           
                        // Words must be separated by TABS!
                        // Expecting two columns
                        $parts = array_map('trim', explode("\t", $line));
                        if ( count($parts) == 2 ) {
			   $this->words[$parts[0]] = $parts[1];
                        }

                     }
                  }
                }
	}

	/**
	 * @param string $phrase
	 * @param int $case
	 * @return string inflected
	 */
	public function inflect($phrase, $case)
	{
		if (!trim($phrase))
		{
			return $phrase;
		}


               $inflected = '';
               foreach (explode(' ', $phrase) as $word) {
	          if (isset($this->words[$word])) {
		     $inflected .= ' ' . $this->words[$word];
		
	          } else {
		     $inflected .= " $word";
		     // file_put_contents('/tmp/phrases', "$word\n", FILE_APPEND);
	          }
               }
               return ltrim($inflected);


		$tagged = $this->morph->tag($phrase);
		if (!$tagged || !is_array($tagged))
		{
			return $phrase;
		}

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
				return Gender::FEMALE;
			}

			$tag = $this->morph->tag($phrase);
			if (!$tag || !is_array($tag))
			{
				return Gender::FEMALE;
			}

			$tagged = $this->flatten($tag);

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
