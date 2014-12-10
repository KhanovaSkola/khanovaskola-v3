<?php

namespace App\Models\Rme;

use App\Models\Orm\Mappers;
use Orm\DibiManyToManyMapper;
use Orm\IRepository;


class UsersMapper extends Mappers\Mapper
{

	public function getJsonFields()
	{
		return ['privileges'];
	}

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

	public function createManyToManyMapper($param, IRepository $targetRepository, $targetParam)
	{
		/** @var DibiManyToManyMapper $mtm */
		$mtm = parent::createManyToManyMapper($param, $targetRepository, $targetParam);

		if ($targetRepository instanceof SubjectsRepository)
		{
			$mtm->table = 'editors_x_subjects';
			$mtm->parentParam = 'user_id';
			$mtm->childParam = 'subject_id';
		}
		else if ($targetRepository instanceof SchemasRepository)
		{
			$mtm->table = 'editors_x_schemas';
			$mtm->parentParam = 'user_id';
			$mtm->childParam = 'schema_id';
		}
		else if ($targetRepository instanceof BlocksRepository)
		{
			$mtm->table = 'editors_x_blocks';
			$mtm->parentParam = 'user_id';
			$mtm->childParam = 'block_id';
		}

		return $mtm;
	}

}
