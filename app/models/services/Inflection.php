<?php

namespace App\Models\Services;

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

	public function __construct(IStorage $storage)
	{
		$this->cache = new Cache($storage, 'inflection');
	}

	/**
	 * @param string $phrase
	 * @param int $case
	 * @return string inflected
	 */
	public function inflect($phrase, $case)
	{
		return $this->cache->load("$phrase|$case", function() use ($phrase, $case) {
			$template = 'https://words.khanovaskola.cz/inflect/%s/%s';
			$raw = file_get_contents(sprintf($template, urlencode($case), urlencode($phrase)));
			$response = json_decode($raw, TRUE);
			return $response['result'];
		});
	}

	/**
	 * @param string $phrase
	 * @return string gender
	 */
	public function gender($phrase)
	{
		return $this->cache->load("$phrase", function() use ($phrase) {
			$template = 'https://words.khanovaskola.cz/gender/%s';
			$raw = file_get_contents(sprintf($template, urlencode($phrase)));
			$response = json_decode($raw, TRUE);
			return $response['result'];
		});
	}

}
