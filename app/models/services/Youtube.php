<?php

namespace App\Models\Services;

use Google_Exception;
use Google_Http_Request;
use Kdyby\Google\Google;


class Youtube
{

	/**
	 * @var Google
	 */
	private $google;

	public function __construct(Google $google)
	{
		$this->google = $google;
	}

	/**
	 * @see http://stackoverflow.com/a/20542029/326257
	 * @param string $youtubeId
	 * @return NULL|string
	 */
	public function getImageUrlFor($youtubeId)
	{
		foreach ([
				'https://img.youtube.com/vi/%s/maxresdefault.jpg', // 1920x1080
				'https://img.youtube.com/vi/%s/sddefault.jpg', // 640x480
				'https://img.youtube.com/vi/%s/hqdefault.jpg', // 480x360
			] as $template)
		{
			$url = sprintf($template, $youtubeId);
			$headers = get_headers($url, TRUE);
			if (strpos($headers[0], '200 OK') !== FALSE)
			{
				return $url;
			}
		}

		return NULL;
	}

	/**
	 * @param string $youtubeId
	 * @return object
	 * @throws Google_Exception
	 */
	public function getMeta($youtubeId)
	{
		$url = 'https://www.googleapis.com/youtube/v3/videos?id=%s&part=contentDetails&key=%s';
		$key = $this->google->getConfig()->apiKey;
		$req = new Google_Http_Request(sprintf($url, $youtubeId, $key));

		$resp = $this->google->getClient()->execute($req);
		return array_pop($resp['items']);
	}

	/**
	 * @param string $youtubeId
	 * @return int
	 */
	public function getDuration($youtubeId)
	{
		$data = $this->getMeta($youtubeId);
		$interval = $data['contentDetails']['duration'];
		return $this->parseISO8601($interval);
	}

	/**
	 * @param string $interval PT4M13S
	 * @return int seconds
	 */
	private function parseISO8601($interval)
	{
		$seconds = 0;
		$matches = [];
		preg_match_all('~(?P<amount>\d+)(?P<type>\w)~', $interval, $matches);
		foreach ($matches['type'] as $i => $type)
		{
			$mul = 1;
			switch ($type) {
				case 'H':
					$mul *= 60;
				case 'M':
					$mul *= 60;
				case 'S':
					$mul *= 1;
			}
			$seconds += $matches['amount'][$i] * $mul;
		}

		return $seconds;
	}

}
