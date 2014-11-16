<?php

namespace Bin\Services;

use App\Models\Orm\Entity;
use App\Models\Orm\IIndexable;
use App\Models\Orm\RepositoryContainer;
use App\Models\Services\ElasticSearch;
use Nette\Object;
use Nette\Reflection\ClassType;


class ElasticPopulator extends Object
{

	/**
	 * @var ElasticSearch
	 */
	private $es;

	/**
	 * @var RepositoryContainer
	 */
	private $orm;

	public function __construct(ElasticSearch $es, RepositoryContainer $orm)
	{
		$this->es = $es;
		$this->orm = $orm;
	}

	/**
	 * @return int
	 */
	public function populate()
	{
		$counter = 0;
		foreach ($this->orm->getRepositoryClasses() as $class)
		{
			$repo = $this->orm->getRepository($class);

			$cn = $repo->getEntityClassName();
			$classes = is_array($cn) ? $cn : [$cn];

			foreach ($classes as $entity)
			{
				$ref = new ClassType($entity);
				if (!$ref->implementsInterface(IIndexable::class))
				{
					continue 2;
				}
			}

			foreach ($repo->findAll() as $entity)
			{
				$this->indexEntity($entity);
				$counter++;
			}
		}

		return $counter;
	}

	/**
	 * @param Entity|IIndexable $entity
	 */
	public function indexEntity(Entity $entity)
	{
		$this->es->addToIndex($entity->getShortEntityName(), (int) $entity->id, $entity->getIndexData());
	}

}
