<?php

namespace App\Models\Rme;

use App\Models\Services\Highlight;
use Orm;
use Orm\OneToMany as OtM;


/**
 * @property string             $youtubeId
 * @property NULL|string        $youtubeIdOriginal  filled if dubbed
 * @property NULL|int           $duration           seconds
 * @property NULL|string        $kaUrl              redirect to localized KA
 * @property NULL|string        $kaKeywords         from KA
 */
class KaVideo extends Content
{

	public function __construct()
	{
		parent::__construct();
		$this->type = 'ka_video';
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
			'youtube_id' => $this->youtubeId,
			'youtube_id_original' => $this->youtubeIdOriginal,
//                        'keywords' => $this->kaKeywords,
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
