<?php

namespace Clevis\Skeleton\Orm;

use Orm;
use Nette;
use Nette\Reflection;
use Orm\Repository;
use Orm\IRepository;
use Orm\RepositoryNotFoundException;


/**
 * Collection of IRepository.
 *
 * Cares about repository initialization.
 * It is the entry point into model from other parts of application.
 * Stores container of services which other objects may need.
 */
class RepositoryContainer extends Orm\RepositoryContainer
{

	/** @var array */
	private $aliases = array();

	/**
	 * Class constuctor – automatically registers repository aliases
	 *
	 * @param Orm\IServiceContainerFactory|Orm\IServiceContainer|NULL
	 * @param array ($alias => $className)
	 */
	public function __construct($containerFactory = NULL, $repositories = array())
	{
		parent::__construct($containerFactory);

		$this->registerAnnotations();

		// registers repositories from config
		foreach ($repositories as $alias => $repositoryClass)
		{
			if (!$this->isRepository($alias))
			{
				$this->register($alias, $repositoryClass);
				$this->aliases[$alias] = $repositoryClass;
			}
		}
	}

	/**
	 * Registers repositories from annotations
	 */
	private function registerAnnotations()
	{
		$annotations = Nette\Reflection\ClassType::from($this)->getAnnotations();
		if (isset($annotations['property-read']))
		{
			$c = get_called_class();
			$namespace = substr($c, 0, strrpos($c, '\\'));
			foreach ($annotations['property-read'] as $value)
			{
				if (preg_match('#^([\\\\\\w]+Repository)\\s+\\$(\\w+)$#', $value, $m))
				{
					$class = strpos($m[1], '\\') === FALSE ? $namespace . '\\' . $m[1] : $m[1];
					$this->register($m[2], $class);
					$this->aliases[$m[2]] = $class;
				}
			}
		}
	}

	/**
	 * Vrací instanci repository.
	 * Přednostně instancuje třídy vyjmenované v aliasech, přičemž bere v potaz dědičnost.
	 *
	 * @param string - repositoryClassName|alias
	 * @return Repository|IRepository
	 * @throws RepositoryNotFoundException
	 */
	public function getRepository($name)
	{
		$name = (string) $name;
		if (isset($this->aliases[$name]))
		{
			$repositoryClass = $this->aliases[$name];
			return parent::getRepository($repositoryClass);
		}
		else
		{
			$repositoryClass = NULL;
			foreach ($this->aliases as $alias => $class)
			{
				if (is_subclass_of($class, $name))
				{
					$repositoryClass = $class;
					break;
				}
			}
			$repository = parent::getRepository($repositoryClass ?: $name);
			$this->aliases[$name] = get_class($repository);
		}

		return $repository;
	}

	/**
	 * Black magic. Work-arround pro nefunkční RepositoryContainer::clean()
	 * Vymaže změny ve všech repozitářích (zapomene nové, změněné a načtené entity)
	 */
	public function purge()
	{
		$ref = new Reflection\ClassType('Orm\\RepositoryContainer');
		$ref = $ref->getProperty('repositories');
		$ref->setAccessible(TRUE);

		$repositories = $ref->getValue($this);

		foreach ($repositories as $repository)
		{
			$this->purgeRepository($repository);
		}
	}

	/**
	 * Black magic. Work-arround pro nefunkční Repository::clean()
	 * Vymaže změny v repozitáři (zapomene nové, změněné a načtené entity)
	 *
	 * @param Orm\Repository
	 */
	public function purgeRepository(Orm\Repository $repository)
	{
		$ref = new Reflection\ClassType('Orm\\IdentityMap');
		$ref = $ref->getProperty('entities');
		$ref->setAccessible(TRUE);

		$map = $repository->getIdentityMap();
		$ref->setValue($map, array());

		foreach ($map->getAllNew() as $entity)
		{
			$map->detach($entity);
		}
	}

}
