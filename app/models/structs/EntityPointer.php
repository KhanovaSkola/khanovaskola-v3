<?php

namespace App\Models\Structs;

use App\Models\Orm\Entity;
use App\Models\Orm\RepositoryContainer;
use Serializable;


/**
 * Serializable for tasks
 */
class EntityPointer implements Serializable
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

	public function serialize()
	{
		return $this->repoClass . ':' . $this->id;
	}

	public function unserialize($serialized)
	{
		list($this->repoClass, $this->id) = explode(':', $serialized);
	}
}
