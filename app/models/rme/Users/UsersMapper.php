<?php

namespace App\Models\Rme;

use App\Models\Orm\Mappers;
use App\Models\Services\Inflection;
use App\Models\Structs\Gender;
use Nette\Utils\DateTime;
use Nette\Utils\Strings;
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

	public function getByEmail($email)
	{
		$email = Strings::lower($email);

		$res = $this->getBy(['email' => $email]);
		if ($res)
		{
			return $res;
		}

		$alias = $this->model->userAliases->getByEmail($email);
		if ($alias)
		{
			return $alias->user;
		}
		return NULL;
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
	 * @return DibiCollection|\Orm\IEntityCollection
	 */
	public function findRegistered()
	{
		return $this->findBy(['registered' => TRUE]);
	}

	/**
	 * @return void
	 *
	 * Results of this function are periodically deleted
	 * from production database. Update with caution!
	 */
	public function deleteOldEmpty()
	{
		$this->connection->query('
			DELETE
			FROM [users]
			WHERE name IS NULL
				AND password IS NULL
				AND email IS NULL
				AND facebook_id IS NULL
				AND google_id IS NULL
				AND registered = "f"
				AND created_at < ?
		', DateTime::from('2 weeks ago')->format('Y-m-d H:i:s'));
	}

}
