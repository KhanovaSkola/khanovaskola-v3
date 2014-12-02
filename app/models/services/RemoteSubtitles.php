<?php

namespace App\Models\Services;

use Nette\Object;
use Nette\Utils\Strings;


class RemoteSubtitles extends Object implements ISubtitleFetcher
{

	/**
	 * @var SubtitleCache
	 */
	public $cache;

	public function __construct(SubtitleCache $cache)
	{
		$this->cache = $cache;
	}

	protected function fetchSubtitles($youtubeId, $cached)
	{
		$url = "https://report.khanovaskola.cz/api/1/subtitles/{$youtubeId}/cs" . ($cached ? '?cached=1' : '');
		$res = file_get_contents($url);
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
			return Strings::normalize($data->subtitles);
		}
		return NULL;
	}

	public function getSubtitles($youtubeId)
	{
		$cached = $this->cache->load($youtubeId);
		$subs = NULL;
		if ($cached)
		{
			list($time, $subs) = $cached;
			if ($time > $time - 5 * 60)
			{
				return $subs;
			}
		}
		$subs = $this->fetchSubtitles($youtubeId, $subs);
		$this->cache->save($youtubeId, [time(), $subs]);

		return $subs;
	}

	public function getTextFromSubtitles($youtubeId)
	{
		$srt = $this->getSubtitles($youtubeId);
		$text = Strings::replace($srt, '~\d+\n+\d+:\d+:\d+[.,]\d+\s+-->\s+\d+:\d+:\d+[.,]\d+\n+~m');
		$text = Strings::replace($text, '~(.)\n+(.)~u', function($m) {
			// add missing sentence fullstops
			if (strpos('.?!…', $m[1]) === FALSE && $m[2] === Strings::upper($m[2]))
			{
				return "$m[1].\n$m[2]";
			}
			return $m[0];
		});
		$text = Strings::replace($text, '~\n+~', ' ');
		return Strings::replace($text, '~[.!?…]\s+(\w)~u', function($m) {
			// fix sentence capitalization
			return Strings::upper($m[0]);
		});
	}

}
