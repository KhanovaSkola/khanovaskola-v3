<?php

namespace App\Rme;

use App\Orm\Mapper\Mapper;


class UsersMapper extends Mapper
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
