<?php

namespace App\Models\Rme;

use App\Models\Orm\Mappers;


class UsersMapper extends Mappers\Mapper
{

	/**
	 * @param string $name nominative
	 * @param string $gender male|female
	 * @return string vocative
	 */
	public function getVocative($name, $gender)
	{
		$dat = $this->connection->query('
			SELECT [vocative]
			FROM [vocatives]
			WHERE
				[gender] = %s AND
				[nominative] = %s
		', $gender, $name)->fetchSingle();
		return explode(':', $dat)[0];
	}

}
