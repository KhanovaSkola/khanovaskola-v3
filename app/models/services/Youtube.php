<?php

namespace App\Models\Services;

use Nette\Utils\Json;


class Youtube
{

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
	 * @return mixed
	 * @throws \Nette\Utils\JsonException
	 */
	public function getMeta($youtubeId)
	{
		$url = 'https://gdata.youtube.com/feeds/api/videos/%s?v=2&alt=jsonc';
		$raw = file_get_contents(sprintf($url, $youtubeId));
		return Json::decode($raw);
	}

}
