<?php

namespace App\Models\Services;

/**
 * Locale management
 * Takes locale from config.local.neon
 */
class Locale
{
	protected $locale;

	public function __construct($locale)
	{
            $this->locale = $locale;
	}

	public function getLocale()
	{
            return $this->locale;
	}

	public function setLocale($locale)
	{
           if ( is_string($locale) ) {
              $this->locale = $locale;
           }
           return NULL;
	}
}
