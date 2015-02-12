<?php

namespace App\Models\Rme;

use App\Models\Orm\Mappers\Mapper;


class BlueprintPartialsMapper extends Mapper
{

	public function getJsonFields()
	{
		return ['hints', 'data'];
	}

}
