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
			WHERE [from_old_web] = "f"
			AND [hidden] = "f"
			ORDER BY [position] ASC
		');
	}

	/**
	 * @deprecated
	 */
	public function findAllOldWeb()
	{
		return $this->dataSource('
			SELECT * FROM [subjects]
			WHERE [from_old_web] = "t"
			AND [hidden] = "f"
			ORDER BY [position] ASC
		');
	}

}
