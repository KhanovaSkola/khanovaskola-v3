<?php

namespace App\Models\Rme;

use App\Models\Rme\BadgeUserBridges\VideoWatched;
use App\Models\Services\Highlight;
use App\Models\Services\RemoteSubtitles;
use Orm;
use Orm\OneToMany as OtM;


/**
 * @property string             $youtubeId
 * @property NULL|string        $youtubeIdOriginal  filled if dubbed
 * @property NULL|int           $duration           seconds
 * @property NULL|string        $preview            absolute url
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
	 * @return array [time int, sentence string]
	 */
	public function getTimedSentences()
	{
		return $this->getSubtitleService()->getTimedSentences($this->youtubeId);
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
			'youtube_id' => $this->youtubeId,
		];
	}

	/**
	 * @return int seconds
	 */
	public function getDuration()
	{
		return $this->getValue('duration') ?: 20 * 60;
	}

}
