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
		$url = "https://report.khanovaskola.cz/api/1/subtitles/{$youtubeId}/cs" . ($cached ? '?cached=1' : '');
		$res = @file_get_contents($url); // was failing randomly
		if (!$res)
		{
			return NULL;
		}

		if ($cached)
		{
			$headers = $http_response_header;
			if (strpos($headers[0], 'HTTP/1.1 304') !== FALSE)
			{
				return $cached;
			}
		}
		$data = json_decode($res);
		if ($data->found)
		{
			return Strings::normalize(Strings::fixEncoding($data->subtitles));
		}
		return NULL;
	}

	/**
	 * @param string $youtubeId
	 * @return NULL|mixed
	 */
	public function getSubtitles($youtubeId)
	{
		return $this->cache->load($youtubeId, function() use ($youtubeId) {
			return $this->fetchSubtitles($youtubeId, FALSE); // NULL does not cache
		});
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
