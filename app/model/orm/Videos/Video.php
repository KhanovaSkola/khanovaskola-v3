<?php

namespace App\Model;

use Nette\Caching\Cache;
use Nette\DateTime;
use Orm;


/**
 * @property string $title
 * @property string $description
 * @property string $youtubeId
 * @property string $youtubeIdOriginal filled if dubbed
 * @property DateTime $createdAt {default now}
 */
class Video extends Entity
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
		$cached = FALSE;
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
			return $data->subtitles;
		}
		return NULL;
	}

	public function getSubtitles()
	{
		/** @var Cache $cache */
		$cache = $this->model->getCache();
		$cacheKey = "subtitles/{$this->id}";

		$cached = $cache->load($cacheKey);
		$subs = NULL;
		if ($cached)
		{
			list($time, $subs) = $cached;
			if ($subs && $time > $time - 5 * 60)
			{
				return $subs;
			}
		}
		$subs = $this->fetchSubtitles($subs);
		$cache->save($cacheKey, [time(), $subs]);

		return $subs;
	}

}
