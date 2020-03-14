<?php

namespace App\Models\Services;

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

}
