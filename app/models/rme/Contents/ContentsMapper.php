<?php

namespace App\Models\Rme;

use App\Models\Orm\Mappers\Mapper;


class ContentsMapper extends Mapper
{

	public function getJsonFields()
	{
		return ['vars', 'hints'];
	}

}
