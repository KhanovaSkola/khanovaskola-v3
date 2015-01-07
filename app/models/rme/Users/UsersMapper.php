<?php

namespace App\Models\Rme;

use App\Models\Orm\Mappers;
use App\Models\Structs\Gender;
use Inflection;
use Orm\DibiCollection;
use Orm\DibiManyToManyMapper;
use Orm\IRepository;


class UsersMapper extends Mappers\Mapper
{

	public function getJsonFields()
	{
		return ['privileges'];
	}

	protected function getNameGenderFlags($name)
	{
		$res = Inflection::parse($name);
		$genders = [Gender::FEMALE => 0, Gender::MALE => 0];
		foreach ($res as $flags)
		{
			switch ($flags[Inflection::GENDER])
			{
				case 'I':
				case 'M':
					$g = Gender::MALE;
					break;
				case 'F':
					$g = Gender::FEMALE;
					break;
				default:
					continue 2;
			}
			$genders[$g]++;
		}
		return $genders;
	}

	/**
	 * @param string $firstName
	 * @param NULL|string $lastName
	 * @return Gender ::MALE|Gender::FEMALE
	 */
	public function getGender($firstName, $lastName = NULL)
	{
		$genders = $this->getNameGenderFlags($firstName);
		if ($lastName)
		{
			foreach ($this->getNameGenderFlags($firstName) as $k => $v)
			{
				$genders[$k] += $v;
			}
		}
		return array_search(max($genders), $genders);
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
