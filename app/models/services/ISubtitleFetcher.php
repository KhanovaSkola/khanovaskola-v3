<?php

namespace App\Models\Services;


interface ISubtitleFetcher
{

	/**
	 * @param string $youtubeId
	 * @return string
	 */
	public function getSubtitles($youtubeId);

	/**
	 * @param string $youtubeId
	 * @return string
	 */
	public function getTextFromSubtitles($youtubeId);

}
