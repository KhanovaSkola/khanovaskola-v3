<?php

namespace App\Models\Tasks;

use App\Models\Orm\Entity;
use App\Models\Orm\RepositoryContainer;


/**
 * Serializable for tasks
 */
class EntityPointer
{

	/**
	 * @var string
	 */
	protected $repoClass;

	/**
	 * @var int
	 */
	protected $id;

	public function __construct(Entity $entity)
	{
		$this->repoClass = get_class($entity->getRepository());
		$this->id = $entity->id;
	}

	/**
	 * @param RepositoryContainer $orm
	 * @return NULL|Entity
	 */
	public function resolve(RepositoryContainer $orm)
	{
		return $orm->getRepository($this->repoClass)->getById($this->id);
	}

}
