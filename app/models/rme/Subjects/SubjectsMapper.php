<?php

namespace App\Models\Rme;

use App\Models\Orm\Mappers\Mapper;


class SubjectsMapper extends Mapper
{

	public function findAll()
	{
		return parent::findAll()->orderBy('position', 'ASC');
	}

}
