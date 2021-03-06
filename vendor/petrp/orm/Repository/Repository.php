<?php
/**
 * Orm
 * @author Petr Procházka (petr@petrp.cz)
 * @license "New" BSD License
 */

namespace Orm;

use Exception;

/**
 * Handles entities.
 * Independently of the specific storage.
 * Saving, deleting, loading entities.
 *
 * For each entity type (or group of related entities) you must create own repository.
 *
 * Convention is named repository plural form and entity singular form.
 *
 * <code>
 * class ArticlesRepository extends Repository
 * </code>
 *
 * Repository must be obtained via IRepositoryContainer {@see RepositoryContainer}
 * <code>
 * $model; // instanceof RepositoryContainer
 * $model->articles; // instanceof ArticlesRepository
 * </code>
 *
 * Repository is independently of the specific storage.
 * About storage is cares Mapper {@see IMapper} {@see DibiMapper}
 *
 * Naming convention methods for retrieving data:
 * `getBy<...>()` for one entity {@see IEntity}
 * `findBy<...>()` for collection of entities {@see IEntityCollection}
 * `findAll()` all entities
 *
 * You can automatically call methods in mapper like `$mapper->findByAuthorAndTag($author, $tag)` etc.
 * But in repository is needed to create all methods:
 * <code>
 * public function findByAuthor($author)
 * {
 * 	return $this->mapper->findByAuthor($author);
 * }
 * public function getByName($name)
 * {
 * 	return $this->mapper->getByName($name);
 * }
 * </code>
 *
 * Defaults repository works with entity named by repository name in singular form `ArticlesRepository > Article` {@see self::getEntityClassName()}.
 *
 * Defaults tries find mapper by repository name `ArticlesRepository > ArticlesMapper`
 * It can be changed by annotation `@mappper`.
 *
 * @see self::getById() Get one entity by primary key.
 * @see self::persist() Saving.
 * @see self::remove() Deleting.
 * @see self::flush() Make changes in storage.
 * @see self::clean() Clear changes in storage.
 *
 * @property-read IMapper $mapper
 * @property-read IRepositoryContainer $model
 * @property-read Events $events
 * @author Petr Procházka
 * @package Orm
 * @subpackage Repository
 */
abstract class Repository extends Object implements IRepository
{

	/** @var IRepositoryContainer */
	private $model;

	/** @var DibiMapper */
	private $mapper;

	/** @var Events */
	private $events;

	/** @var IdentityMap */
	private $identityMap;

	/** @var MapperAutoCaller {@see self::__call()} */
	private $mapperAutoCaller;

	/**
	 * @var string
	 * @see self::getEntityClassName()
	 */
	protected $entityClassName;

	/**
	 * @param IRepositoryContainer
	 */
	public function __construct(IRepositoryContainer $model)
	{
		$this->model = $model;
		$this->events = new Events($this);
		$ph = $this->createPerformanceHelper();
		if ($ph !== NULL AND !($ph instanceof PerformanceHelper))
		{
			throw new BadReturnException(array($this, 'createPerformanceHelper', 'Orm\PerformanceHelper or NULL', $ph));
		}
		$this->identityMap = new IdentityMap($this, $ph);
	}

	/**
	 * @param scalar
	 * @return IEntity|NULL
	 */
	final public function getById($id)
	{
		if ($id instanceof IEntity)
		{
			$id = $id->id;
		}
		else if ($id === NULL)
		{
			return NULL;
		}
		else if (!is_scalar($id))
		{
			throw new InvalidArgumentException(array($this, 'getById() $id', 'scalar', $id));
		}
		$entity = $this->identityMap->getById($id);
		if ($entity === NULL)
		{
			$entity = $this->getMapper()->getById($id);
			if ($entity === NULL)
			{
				// nastavit ze neexistuje
				$this->identityMap->remove($id);
			}
		}
		else if ($entity === false)
		{
			// uz se jednou zkouselo a neexistuje
			$entity = NULL;
		}
		return $entity;
	}

	/**
	 * Zapoji entity do do repository.
	 *
	 * Vola udalosti:
	 * @see Events::ATTACH
	 * @see Entity::onAttach()
	 *
	 * @param IEntity
	 * @return IEntity
	 */
	public function attach(IEntity $entity)
	{
		$this->identityMap->check($entity);
		if (!$entity->getRepository(false))
		{
			$this->identityMap->attach($entity);
			$this->events->fireEvent(Events::ATTACH, $entity);
		}
		return $entity;
	}

	/**
	 * Ulozit entitu {@see IMapper::persist()} a zapoji ji do repository {@see self::attach()}
	 * Jen kdyz se zmenila {@see Entity::isChanged()}
	 *
	 * Ulozi take vsechny relationship, tedy entity ktere tato entity obsahuje v ruznych vazbach.
	 *
	 * Vola udalosti:
	 * @see Events::PERSIST_BEFORE
	 * @see Entity::onBeforePersist()
	 * @see Events::PERSIST_BEFORE_UPDATE OR Events::PERSIST_BEFORE_INSERT
	 * @see Entity::onBeforeUpdate() OR Entity::onBeforeInsert()
	 * @see Events::PERSIST
	 * @see Entity::onPersist()
	 * @see Events::PERSIST_AFTER_UPDATE OR Events::PERSIST_AFTER_INSERT
	 * @see Entity::onAfterUpdate() OR Entity::onAfterInsert()
	 * @see Events::PERSIST_AFTER
	 * @see Entity::onAfterPersist()
	 *
	 * @param IEntity
	 * @param bool Persist all associations?
	 * @return IEntity
	 */
	final public function persist(IEntity $entity, $all = true)
	{
		$this->attach($entity);
		$hasId = isset($entity->id);
		if ($hasId)
		{
			$hasId = $entity->id;
			if (!$entity->isChanged())
			{
				return $entity;
			}
		}
		$recursionRelationship = array();
		static $recursionRelationshipCallback;
		if (!$recursionRelationshipCallback) $recursionRelationshipCallback = function (IEntity $entity, array & $recursionRelationship, $all, $persist = false) {
			foreach ($recursionRelationship as $k => $tmp)
			{
				list($repository, $key, $value) = $tmp;
				if ($persist)
				{
					if ($all OR !isset($value->id))
					{
						$repository->persist($value, $all);
					}
				}
				if ($key !== NULL)
				{
					$entity->{$key} = $value;
				}
				unset($recursionRelationship[$k]);
			}
		};
		try {
			$hash = spl_object_hash($entity);
			static $recurcion = array();
			if (isset($recurcion[$hash]) AND $recurcion[$hash] > 1)
			{
				throw new RecursiveException("There is an infinite recursion during persist in " . EntityHelper::toString($entity), $recurcion[$hash]);
			}
			if (!isset($recurcion[$hash])) $recurcion[$hash] = 0;
			$recurcion[$hash]++;

			$this->events->fireEvent(Events::PERSIST_BEFORE, $entity);
			$this->events->fireEvent($hasId ? Events::PERSIST_BEFORE_UPDATE : Events::PERSIST_BEFORE_INSERT, $entity);

			$relationshipValues = array();
			$fk = $this->getFkForEntity(get_class($entity));
			foreach ($entity->toArray() as $key => $value)
			{
				if (isset($fk[$key]) AND $value instanceof IEntity)
				{
					$repository = $this->getModel()->getRepository($fk[$key]);
					try {
						if ($all OR !isset($value->id))
						{
							$repository->persist($value, $all);
						}
					} catch (RecursiveException $re) {
						if (isset($value->id))
						{
							$recursionRelationship[] = array($repository, NULL, $value);
						}
						else
						{
							try {
								$entity->{$key} = NULL;
							} catch (Exception $ree) {
								try {
									if ($entity->{$key} !== NULL)
									{
										throw $re;
									}
									// zmanena ze vyvolalo pravdepodobne chybu v provazni 1:1 ale prenastavolo se na null takze lze pokracovat
								} catch (Exception $ree) {
									throw $re;
								}
							}
							$recursionRelationship[] = array($repository, $key, $value);
						}
					}
				}
				else if ($value instanceof IRelationship)
				{
					$relationshipValues[] = $value;;
				}
			}
			if (!$entity->isChanged())
			{
				unset($recurcion[$hash]);
				$recursionRelationshipCallback($entity, $recursionRelationship, $all);
				return $entity;
			}

			if ($id = $this->getMapper()->persist($entity))
			{
				$args = array('id' => $id);
				$this->events->fireEvent(Events::PERSIST, $entity, $args);
				$this->identityMap->detach($entity);
				if ($hasId)
				{
					$this->identityMap->remove($hasId);
				}
				$id = $entity->id;
				$this->identityMap->add($id, $entity);

				$recursionRelationshipCallback($entity, $recursionRelationship, $all, true);
				foreach ($relationshipValues as $relationship)
				{
					$relationship->persist($all);
				}

				$this->events->fireEvent($hasId ? Events::PERSIST_AFTER_UPDATE : Events::PERSIST_AFTER_INSERT, $entity);
				$this->events->fireEvent(Events::PERSIST_AFTER, $entity);
				if ($entity->isChanged() AND $entity->getRepository(false) === $this)
				{
					$this->getMapper()->persist($entity);
					$this->events->fireEvent(Events::PERSIST, $entity, $args);
				}
				unset($recurcion[$hash]);
				return $entity;
			}
			throw new BadReturnException(array($this->getMapper(), 'persist', 'TRUE', NULL, '; something wrong with mapper'));

		} catch (Exception $e) {
			unset($recurcion[$hash]);
			$recursionRelationshipCallback($entity, $recursionRelationship, $all);
			throw $e;
		}
	}

	/**
	 * Smaze entitu z uloziste {@see IMapper::remove()} a odpoji ji z repository.
	 * Z entitou lze pak jeste pracovat do ukonceni scriptu, ale uz nema id a neni zapojena na repository.
	 *
	 * Vola udalosti:
	 * @see Events::REMOVE_BEFORE
	 * @see Entity::onBeforeRemove()
	 * @see Events::REMOVE_AFTER
	 * @see Entity::onAfterRemove()
	 *
	 * @param scalar|IEntity
	 * @return bool
	 */
	final public function remove($entity)
	{
		$entity = $entity instanceof IEntity ? $entity : $this->getById($entity);
		$this->identityMap->check($entity);

		if (isset($entity->id) OR $entity->getRepository(false))
		{
			$this->events->fireEvent(Events::REMOVE_BEFORE, $entity);
			if (isset($entity->id))
			{
				if (!$this->getMapper()->remove($entity))
				{
					throw new BadReturnException(array($this->getMapper(), 'remove', 'TRUE', NULL, '; something wrong with mapper'));
				}
				$this->identityMap->remove($entity->id);
			}
			$this->identityMap->detach($entity);
			$this->events->fireEvent(Events::REMOVE_AFTER, $entity);
		}
		return true;
	}

	/**
	 * Persist all unpersist entities at all repositories.
	 * @return Repository $this
	 * @see IRepositoryContainer::persistAll()
	 */
	final public function persistAll()
	{
		$this->getModel()->persistAll($this);
		return $this;
	}

	/**
	 * Primitne vsechny zmeny do uloziste.
	 * Na vsech repozitarich.
	 * @return void
	 * @see IMapper::flush()
	 * @see RepositoryContainer::flush()
	 */
	final public function flush()
	{
		if (func_num_args() > 0 AND func_get_arg(0))
		{
			throw new DeprecatedException(array(__CLASS__, 'flush(TRUE)'));
		}
		return $this->getModel()->flush($this);
	}

	/**
	 * Ulozit entitu a primitne vsechny zmeny do uloziste.
	 * @see self::persist()
	 * @see self::flush()
	 * @param IEntity
	 * @return IEntity
	 */
	final public function persistAndFlush(IEntity $entity)
	{
		$this->persist($entity);
		$this->flush();
		return $entity;
	}

	/**
	 * Zrusi vsechny zmeny, ale do ukonceni scriptu se zmeny porad drzi.
	 * Na vsech repozitarich.
	 * @todo zrusit i zmeny na entitach, aby se hned vratili do puvodniho stavu.
	 * @return void
	 * @see IMapper::clean()
	 * @see RepositoryContainer::clean()
	 */
	final public function clean()
	{
		if (func_num_args() > 0 AND func_get_arg(0))
		{
			throw new DeprecatedException(array(__CLASS__, 'clean(TRUE)'));
		}
		return $this->getModel()->clean($this);
	}

	/**
	 * Mapper ktery pouziva tato repository.
	 * @see self::createMapper()
	 * @return DibiMapper |IMapper
	 */
	final public function getMapper()
	{
		if ($this->mapper === NULL)
		{
			$mapper = $this->createMapper();
			if (!($mapper instanceof IMapper))
			{
				if (is_object($mapper))
				{
					throw new BadReturnException('Mapper ' . get_class($mapper) . ' must implement Orm\IMapper');
				}
				throw new BadReturnException(array($this, 'createMapper', 'Orm\IMapper', $mapper));
			}
			$this->mapper = $mapper;
		}
		return $this->mapper;
	}

	/** @return IRepositoryContainer */
	final public function getModel()
	{
		return $this->model;
	}

	/** @return Events */
	final public function getEvents()
	{
		return $this->events;
	}

	/**
	 * Mozno ovlivnit jake entity repository vyraby.
	 * Pri $data === NULL vraci pole nazvu vsech trid ktere tato repository muze vyrobit,
	 * jinak vraci konkretni nazev tridy pro tyto data.
	 * Kdyz vyraby jen jednu tridu muze pokazde vratit string.
	 *
	 * Defaultne vraci nazev repository v jednotem cisle; pro prevod pouziva {@see Inflector::singularize()}.
	 * V pripade potreby je mozne prepsat tuto metodu, nebo property $entityClassName:
	 * <code>
	 * // MiceRepository
	 * protected $entityClassName = 'Mouse';
	 * </code>
	 *
	 * Repository muze vyrabet ruzne entity, muze se rozhodovat na zaklade nejake polozky kterou ma ulozenou v ulozisti, napr. $type
	 * <code>
	 * // ProductsRepository
	 * public function getEntityClassName(array $data = NULL)
	 * {
	 * 	$entities = array(
	 * 		Product::BOOK => 'Book',
	 * 		Product::MAGAZINE => 'Magazine',
	 * 		Product::CD_MUSIC => 'CdMusic',
	 * 		Product::DVD_MOVIE => 'DvdMovie',
	 * 	);
	 *
	 * 	if ($data === NULL) return $entities;
	 * 	else if (isset($entities[$data['type']])) return $entities[$data['type']];
	 * }
	 *
	 * </code>
	 *
	 * @param array|NULL
	 * @return string|array
	 */
	public function getEntityClassName(array $data = NULL)
	{
		if ($this->entityClassName === NULL)
		{
			$helper = $this->getModel()->getContext()->getService('repositoryHelper', 'Orm\RepositoryHelper');
			$this->entityClassName = Inflector::singularize($helper->normalizeRepository($this));
		}
		return $this->entityClassName;
	}

	/**
	 * Donacteni parametru do entity.
	 * Do not call directly.
	 * @see Entity::getValue()
	 * @param IEntity
	 * @param string
	 * @return array
	 * @todo refaktorovat
	 */
	public function lazyLoad(IEntity $entity, $param)
	{
		return array();
	}

	/**
	 * Vytvori mapper pro tuto repository.
	 * Defaultne nacita mapper podle jmena `<RepositoryName>Mapper`.
	 * Jinak DibiMapper.
	 * Pro pouziti vlastniho mapper staci jen vytvorit tridu podle konvence, nebo prepsat tuto metodu.
	 * @return DibiMapper |IMapper
	 * @see self::getMapper()
	 */
	protected function createMapper()
	{
		return $this
			->model
			->getContext()
			->getService('mapperFactory', 'Orm\IMapperFactory')
			->createMapper($this)
		;
	}

	/**
	 * Je mozne tuto entitu pripojit do tohoto repository?
	 * @param IEntity
	 * @return bool
	 * @see self::getEntityClassName()
	 */
	final public function isAttachableEntity(IEntity $entity)
	{
		return $this->identityMap->check($entity, false);
	}

	/**
	 * @return PerformanceHelper|NULL
	 * @see self::__construct()
	 */
	protected function createPerformanceHelper()
	{
           //DH DEBUG
		return NULL;
		if (PerformanceHelper::$keyCallback)
		{
			$context = $this->model->getContext();
			if ($context->hasService('performanceHelperCache'))
			{
				return new PerformanceHelper($this, $context->getService('performanceHelperCache', 'ArrayAccess'));
			}
		}
		return NULL;
	}

	/**
	 * Vytvori entity, nebo vrati tuto existujici.
	 * Do not call directly. Only from implementation of {@see IEntityCollection}.
	 *
	 * Vola udalosti:
	 * @see Events::HYDRATE_BEFORE
	 * @see Entity::onLoad()
	 * @see Events::HYDRATE_AFTER
	 *
	 * @param array
	 * @return IEntity
	 * @see self::getEntityClassName()
	 */
	final public function hydrateEntity($data)
	{
		return $this->identityMap->create($data);
	}

	/** @return IdentityMap */
	final public function getIdentityMap()
	{
		return $this->identityMap;
	}

	/**
	 * Call to undefined method.
	 * @param string method name
	 * @param array arguments
	 * @return mixed
	 * @throws MemberAccessException
	 */
	public function __call($name, $args)
	{
		if ($this->mapperAutoCaller === NULL)
		{
			$this->mapperAutoCaller = new MapperAutoCaller($this, $this->getModel()->getContext()->getService('annotationsParser'));
		}
		if ($this->mapperAutoCaller->has($name))
		{
			return call_user_func_array(array($this->getMapper(), $name), $args);
		}
		return parent::__call($name, $args);
	}

	/**
	 * Vrati cizy klice pro tuto entitu.
	 * @param string
	 * @return array paramName => repositoryName
	 */
	final private function getFkForEntity($entityName)
	{
		static $fks = array();
		if (!isset($fks[$entityName]))
		{
			$fk = array();
			foreach (MetaData::getEntityRules($entityName, $this->model) as $name => $rule)
			{
				if ($rule['relationship'] !== MetaData::ManyToOne AND $rule['relationship'] !== MetaData::OneToOne) continue;
				$fk[$name] = $rule['relationshipParam'];
			}
			$fks[$entityName] = $fk;
		}
		return $fks[$entityName];
	}

	/** @deprecated */
	final public function createEntity($data)
	{
		throw new DeprecatedException(array(__CLASS__, 'createEntity()', __CLASS__, 'hydrateEntity()'));
	}

	/** @deprecated */
	final public function isEntity(IEntity $entity)
	{
		throw new DeprecatedException(array(__CLASS__, 'isEntity()', __CLASS__, 'isAttachableEntity()'));
	}

	/** @deprecated */
	final public function getRepositoryName()
	{
		throw new DeprecatedException(array(__CLASS__, 'getRepositoryName()', 'get_class($repository)'));
	}

}
