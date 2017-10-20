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

	public function getParsedSubtitles()
	{
		return $this->getSubtitleService()->getParsedSubtitles($this->youtubeId);
	}

	public function forceSubtitleUpdate()
	{
		$this->markAsChanged('youtubeId'); // hack to force persist on flush
		$this->getSubtitleService()->reloadSubtitles($this->youtubeId);
	}

	public function getTextFromSubtitles()
	{
           //DH:  For dubbed videos use subtitles from original English video,
           //     but just for a hidden transcript for better SEO.
                if (empty($this->youtubeIdOriginal)) {
                   //return $this->youtubeIdOriginal;
		  return $this->getSubtitleService()->getTextFromSubtitles($this->youtubeId);
                } else {
		  return $this->getSubtitleService()->getTextFromSubtitles($this->youtubeIdOriginal);
                }
                   
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
	 * @return FALSE|array [field => data]
	 */
	public function getIndexData()
	{
		$index = parent::getIndexData();
		if ($index === FALSE)
		{
			return FALSE;
		}

		return $index + [
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

	public function getAugmentedDescription(Block $block = NULL, Schema $schema = NULL)
	{
		$out = $this->description;
		if (!preg_match('~[.!?]$~', $this->description))
		{
			$out .= '.';
		}
		$out .= ' ';

		$breadcrumbs = [];
		if ($schema && $schema->subject)
		{
			$breadcrumbs[] = $schema->subject->title;
		}
		if ($schema)
		{
			$breadcrumbs[] = $schema->title;
		}
		if ($block)
		{
			$breadcrumbs[] = $block->title;
		}

		$out .= implode(', ', $breadcrumbs);

		return $out;
	}

}
