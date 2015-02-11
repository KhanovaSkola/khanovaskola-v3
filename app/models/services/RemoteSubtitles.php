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

	/**
	 * @param string $youtubeId
	 * @return array [time int, sentence string]
	 */
	public function getTimedSentences($youtubeId)
	{
		$srt = $this->getSubtitles($youtubeId);
		$result = [];

		$sentence = NULL;
		$time = NULL;

		$lastCharEndedSentence = FALSE;

		foreach (preg_split('~(^|\r*\n\r*\n\r*)\d+\r*\n\r*~', $srt, -1, PREG_SPLIT_NO_EMPTY) as $row)
		{
			$row = preg_replace_callback('~(\d+:\d+:\d+[.,]\d+)\s+-->\s+\d+:\d+:\d+[.,]\d+\n+~m', function($m) use (&$time) {
				$time = $this->parseTime($m[1]);
				return '';
			}, $row);

			if (!$row)
			{
				continue;
			}

			$startsWithUppercase = $row[0] === mb_convert_case($row[0], MB_CASE_UPPER);

			if ($lastCharEndedSentence && $startsWithUppercase)
			{
				$result[] = ['time' => $time, 'sentence' => $sentence];
				$sentence = NULL;
			}

			$sentence = trim("$sentence $row", ' ');
			$lastCharEndedSentence = (bool) preg_match('~[.?!]$~', $row);
		}
		if ($sentence)
		{
			$result[] = ['time' => $time, 'sentence' => $sentence];
		}

		return $result;
	}

	/**
	 * @param string $time 00:00:18,943
	 * @return string seconds
	 */
	protected function parseTime($time)
	{
		list($h, $m, $s) = explode(':', $time);
		list($s) = explode('.', str_replace(',', '.', $s));
		return $h * 3600 + $m * 60 + $s;
	}

}
