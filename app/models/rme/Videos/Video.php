<?php

namespace App\Models\Rme;

use App\Models\Orm\ContentEntity;
use App\Models\Services\RemoteSubtitles;
use Nette\Utils\Strings;
use Orm;


/**
 * @property string $youtubeId
 * @property string $youtubeIdOriginal filled if dubbed {default ''}
 *
 * @property Orm\OneToMany $videoWatchedBadges {1:m badgeUserBridges $video}
 * @property Orm\OneToMany $comments {1:m comments $video}
 * @property Orm\OneToMany $views {1:m videoViews $video}
 */
class Video extends ContentEntity
{

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
		return [
			'title' => $this->title,
			'description' => $this->description,
			'subtitles' => $this->getTextFromSubtitles(),
			'pathStarts' => 0 // computed in background worker
		];
	}

}
