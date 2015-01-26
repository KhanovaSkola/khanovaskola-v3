<?php

namespace App\Models\Rme;

use App\Models\Orm\Mappers\Mapper;


class SubjectsMapper extends Mapper
{

	public function findAll()
	{
		return parent::findAll()->orderBy('position', 'ASC');
	}

	public function findAllButOldWeb()
	{
		return $this->dataSource('
			SELECT * FROM [subjects]
			WHERE [position] >= 0
			ORDER BY position ASC
		');
	}

	/**
	 * @deprecated
	 */
	public function findMetaSubjects()
	{
		return $this->dataSource('
			SELECT * FROM [subjects]
			WHERE [position] < 0
			ORDER BY position ASC
		');
	}

}
