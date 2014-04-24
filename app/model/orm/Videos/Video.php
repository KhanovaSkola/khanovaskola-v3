<?php

namespace App\Model;


use Nette\DateTime;
use Nette\Utils\Strings;
use Orm;


/**
 * @property string $title
 * @property string $description
 * @property string $youtubeId
 * @property string $youtubeIdOriginal filled if dubbed {default ''}
 * @property DateTime $createdAt {default now}
 */
class Video extends Entity implements IIndexable
{

	/**
	 * @return string url
	 */
	public function getYoutubeUrl()
	{
		return "https://www.youtube.com/watch?v={$this->youtubeId}";
	}

	protected function fetchSubtitles($cached)
	{
		$url = "https://report.khanovaskola.cz/api/1/subtitles/{$this->youtubeId}/cs" . ($cached ? '?cached=1' : '');
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

	public function getSubtitles()
	{
		$cache = $this->getCache();
		$cacheKey = "subtitles/{$this->id}";

		$cached = $cache->load($cacheKey);
		$subs = NULL;
		if ($cached)
		{
			list($time, $subs) = $cached;
			if ($time > $time - 5 * 60)
			{
				return $subs;
			}
		}
		$subs = $this->fetchSubtitles($subs);
		$cache->save($cacheKey, [time(), $subs]);

		return $subs;
	}

	public function getTextFromSubtitles()
	{
		$srt = $this->getSubtitles();
		$text = Strings::replace($srt, '~\d+\n+\d+:\d+:\d+[.,]\d+\s+-->\s+\d+:\d+:\d+[.,]\d+\n+~m');
		return Strings::replace($text, '~\n+~', ' ');
	}

	/**
	 * @return array [field => data]
	 */
	public function getIndexData()
	{
		return [
			'title' => $this->title,
			'description' => $this->description,
			'subtitles' => $this->getTextFromSubtitles(),
		];
	}
}
