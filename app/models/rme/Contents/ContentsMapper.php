<?php

namespace App\Models\Rme;

use App\Models\Orm\Mappers\ElasticSearchMapper;
use Orm\DibiCollection;


class ContentsMapper extends ElasticSearchMapper
{

	/**
	 * @return DibiCollection|Video[]
	 */
	public function findAllVideos()
	{
		return $this->findBy(['type' => 'video']);
	}

	/**
	 * @return DibiCollection|Blueprint[]
	 */
	public function findAllBlueprints()
	{
		return $this->findBy(['type' => 'blueprint']);
	}

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
