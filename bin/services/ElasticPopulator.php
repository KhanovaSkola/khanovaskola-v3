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
	 * @param callable $begin {int $count}
	 * @param callable $tick {}
	 * @return int
	 */
	public function populate(callable $begin = NULL, callable $tick = NULL)
	{
		$counter = 0;

		$repos = [];
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

			$repos[] = $repo;
		}

		$total = 0;
		foreach ($repos as $repo)
		{
			$total += $repo->findAll()->count();
		}
		$begin($total);

		foreach ($repos as $repo)
		{
			foreach ($repo->findAll() as $entity)
			{
				$this->indexEntity($entity);
				$tick();
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
		$data = $entity->getIndexData();
		if ($data !== FALSE)
		{
			$this->es->addToIndex($entity->getShortEntityName(), (int) $entity->id, $data);
		}
	}

}
