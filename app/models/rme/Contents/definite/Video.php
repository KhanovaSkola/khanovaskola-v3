<?php

namespace App\Models\Rme;

use App\Models\Rme\BadgeUserBridges\VideoWatched;
use App\Models\Services\RemoteSubtitles;
use Orm;
use Orm\OneToMany as OtM;


/**
 * @property string             $youtubeId
 * @property NULL|string        $youtubeIdOriginal  filled if dubbed
 *
 * @property OtM|VideoView[]    $views              {1:m videoViews $video}
 * @property OtM|VideoWatched[] $videoWatchedBadges {1:m badgeUserBridges $video}
 */
class Video extends Content
{

	public function __construct()
	{
		parent::__construct();
		$this->type = 'video';
	}

	/**
	 * @return RemoteSubtitles
	 */
	protected function getSubtitleService()
	{
		return $this->getContainer()->getByType(RemoteSubtitles::class);
	}

	public function getSubtitles()
	{
		return $this->getSubtitleService()->getSubtitles($this->youtubeId);
	}

	public function getTextFromSubtitles()
	{
		return $this->getSubtitleService()->getTextFromSubtitles($this->youtubeId);
	}

	/**
	 * @return string url
	 */
	public function getYoutubeUrl()
	{
		return "https://www.youtube.com/watch?v={$this->youtubeId}";
	}

	/**
	 * @return array [field => data]
	 */
	public function getIndexData()
	{
		return parent::getIndexData() + [
			'subtitles' => $this->getTextFromSubtitles(),
		];
	}

	/**
	 * @return int seconds
	 */
	public function getDuration()
	{
		return 20 * 60; // TODO
	}

}
