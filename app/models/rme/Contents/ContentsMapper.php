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

	public function getVideoById($id)
	{
		return $this->getBy(['type' => 'video', 'id' => $id]);
	}

	public function getBlueprintById($id)
	{
		return $this->getBy(['type' => 'blueprint', 'id' => $id]);
	}

}
