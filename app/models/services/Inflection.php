<?php

namespace App\Models\Services;

use App\Models\Structs\Gender;
use Nette\Caching\Cache;
use Nette\Caching\IStorage;
use App\Models\Services\Locale;

/*
  Manual inflection (previously used Morphodita library
 */
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
         * @var Locale 
         */
        private $locale;


	/** @var string[] word => inflected */
	private $words;

	public function __construct(IStorage $storage, Locale $locale)
	{
		$this->cache = new Cache($storage, 'inflection');
                $this->locale = $locale;
                $lc = $this->locale->getLocale();

                $dict_file = __DIR__."/../../dict.$lc.txt";

                if ( file_exists($dict_file) ) {


		  $lines = explode("\n", file_get_contents($dict_file),-1);

		  foreach ($lines as $line) {

                     //skip lines starting with #
                     if ( ! strpos(trim($line),"#" ) ) {
                           
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
	          }
               }

               return ltrim($inflected);
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

        /* TODO: Remove this
         *
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
