<?php

namespace App\Models\Rme;

use App\Models\Services\Highlight;
use Orm;
use Orm\OneToMany as OtM;


/**
 * @property string             $youtubeId
 * @property NULL|string        $kaUrl              redirect to localized KA
 */
class KaArticle extends Content
{

	public function __construct()
	{
		parent::__construct();
		$this->type = 'ka_article';
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

		return $index;
	}

}
