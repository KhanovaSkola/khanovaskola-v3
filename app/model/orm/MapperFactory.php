<?php

namespace App\Orm;

use App\Orm\Mapper\ElasticSearchTrait;
use App\Orm\Mapper\EventManagerTrait;
use App\Orm\Mapper\Mapper;
use App\Orm\Mapper\Neo4jTrait;
use App\Orm\Mapper\QueueTrait;
use App\Orm\Mapper\TranslatorTrait;
use App\Services\ElasticSearch;
use App\Services\Neo4j;
use App\Services\Queue;
use App\Services\Translator;
use Kdyby\Events\EventManager;
use Nette\DI\Container;
use Orm\AnnotationClassParser;
use Orm\IMapper;
use Orm\IRepository;


class MapperFactory extends \Orm\MapperFactory
{

	/** @var Container */
	private $container;

	public function __construct(AnnotationClassParser $parser, Container $container)
	{
		parent::__construct($parser);
		$this->container = $container;
	}


	/**
	 * @param IRepository $repository
	 * @internal param $IRepository
	 * @return IMapper
	 */
	public function createMapper(IRepository $repository)
	{
		$class = $this->getMapperClass($repository);
		/** @var Mapper $mapper */
		$mapper = new $class($repository);
		$traits = $this->getTraits($class);

		if (in_array('App\\Orm\\Mapper\\ElasticSearchTrait', $traits))
		{
			/** @var ElasticSearch $elastic */
			$elastic = $this->container->getService('elastic');
			/** @var ElasticSearchTrait $mapper */
			$mapper->injectElasticSearch($elastic);
		}
		if (in_array('App\\Orm\\Mapper\\TranslatorTrait', $traits))
		{
			/** @var Translator $translator */
			$translator = $this->container->getService('translator');
			/** @var TranslatorTrait $mapper */
			$mapper->injectTranslator($translator);
		}
		if (in_array('App\\Orm\\Mapper\\EventManagerTrait', $traits))
		{
			/** @var EventManager $eventManager */
			$eventManager = $this->container->getByType('Kdyby\\Events\\EventManager');
			/** @var EventManagerTrait $mapper */
			$mapper->injectEventManager($eventManager);
		}
		if (in_array('App\\Orm\\Mapper\\Neo4jTrait', $traits))
		{
			/** @var Neo4j $neo4j */
			$neo4j = $this->container->getService('neo4j');
			/** @var Neo4jTrait $mapper */
			$mapper->injectNeo4j($neo4j);
		}
		if (in_array('App\\Orm\\Mapper\\QueueTrait', $traits))
		{
			/** @var Queue $queue */
			$queue = $this->container->getService('queue');
			/** @var QueueTrait $mapper */
			$mapper->injectQueue($queue);
		}

		$mapper->registerEvents($repository->getEvents());

		return $mapper;
	}

	private function getTraits($class)
	{
		$traits = class_uses($class);
		foreach (class_parents($class) as $parent)
		{
			$traits = array_merge($traits, class_uses($parent));
			if ($parent === 'App\\Model\\Mapper')
			{
				break;
			}
		}

		return $traits;
	}

}
