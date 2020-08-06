<?php

namespace App\Models\Services;

use Nette\SmartObject;
use Nette\Utils\Strings;


class RemoteSubtitles implements ISubtitleFetcher
{
  use SmartObject;

	/**
	 * @var SubtitleCache
	 */
	public $cache;

	/**
	 * @var Srt
	 */
	private $srt;

	public function __construct(SubtitleCache $cache, Srt $srt)
	{
		$this->cache = $cache;
		$this->srt = $srt;
	}

	protected function fetchSubtitles($youtubeId, $cached)
	{
    // NOTE(danielhollas): Instead of relying on Report API, 
    // we read the subtitles directly from files (no DB involved)
    // New subtitles need to be uploaded to server manually for now.
    //
    // Perhaps later we could use memcached or redis for caching in memory
    $fname = "/srv/khanovaskola.cz/data/subs_new/".$youtubeId.".cs.srt";
    if (!file_exists($fname)) {
      return NULL;
    }
    $res = file_get_contents($fname);
		if (!$res)
		{
			return NULL;
    }
    else {
      return Strings::normalize(Strings::fixEncoding($res));
    }
	}

	/**
	 * @param string $youtubeId
	 * @return NULL|mixed
	 */
	public function getSubtitles($youtubeId)
	{
			return $this->fetchSubtitles($youtubeId, FALSE); // NULL does not cache
	}

	/**
	 * @param $youtubeId
	 * @return NULL|mixed
	 */
	public function reloadSubtitles($youtubeId)
	{
		$this->cache->remove($youtubeId);
		return $this->getSubtitles($youtubeId);
	}

	/**
	 * @param $youtubeId
	 * @return array[start, end, text]
	 */
	public function getParsedSubtitles($youtubeId)
	{
		$plaintext = $this->getSubtitles($youtubeId);
		return $this->srt->parse($plaintext);
	}

	/**
	 * @param string $youtubeId
	 * @return string
	 */
	public function getTextFromSubtitles($youtubeId)
	{
		$plaintext = $this->getSubtitles($youtubeId);
		$srt = $this->srt->parseToTimedSentences($plaintext);

		$out = '';
		foreach ($srt as $row)
		{
			$out .= ' ' . $row['sentence'];
		}
		return ltrim($out);
	}

	/**
	 * @param string $youtubeId
	 * @return array [time int, sentence string]
	 */
	public function getTimedSentences($youtubeId)
	{
		$plaintext = $this->getSubtitles($youtubeId);
		return $this->srt->parseToTimedSentences($plaintext);
	}

}
