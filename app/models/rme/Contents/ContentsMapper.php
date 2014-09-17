<?php

namespace App\Models\Rme;

use App\Models\Orm\Mappers\ElasticSearchMapper;


class ContentsMapper extends ElasticSearchMapper
{

	public function getJsonFields()
	{
		return ['vars', 'hints'];
	}

	public function getShortEntityName()
	{
		return 'content';
	}

	public function getNextContent()
	{
		return [];
	}

}
