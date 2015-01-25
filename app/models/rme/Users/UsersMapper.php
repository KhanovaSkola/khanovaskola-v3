<?php

namespace App\Models\Rme;

use App\Models\Orm\Mappers;
use App\Models\Services\Inflection;
use App\Models\Structs\Gender;
use Orm\DibiCollection;
use Orm\DibiManyToManyMapper;
use Orm\IRepository;


class UsersMapper extends Mappers\Mapper
{

	/**
	 * @var Inflection
	 * @inject
	 */
	public $inflection;

	public function getJsonFields()
	{
		return ['privileges'];
	}

	/**
	 * @param string $firstName
	 * @param NULL|string $lastName
	 * @return Gender::MALE|Gender::FEMALE
	 */
	public function getGender($firstName, $lastName = NULL)
	{
		return $this->inflection->gender($firstName);
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

	/**
	 * @return DibiCollection
	 */
	public function findRegistered()
	{
		return $this->findBy(['registered' => TRUE]);
	}

}
