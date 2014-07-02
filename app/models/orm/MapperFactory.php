<?php

namespace App\Models\Orm;

use App\Models\Orm\Mappers;
use App\Models\Services\ElasticSearch;
use App\Models\Services\Neo4j;
use App\Models\Services\Queue;
use App\Models\Services\Translator;
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
		/** @var Mappers\Mapper $mapper */
		$mapper = new $class($repository);
		$traits = $this->getTraits($class);

		if (in_array('App\\Models\\Orm\\Mappers\\ElasticSearchTrait', $traits))
		{
			/** @var ElasticSearch $elastic */
			$elastic = $this->container->getByType(ElasticSearch::class);
			/** @var Mappers\ElasticSearchTrait $mapper */
			$mapper->injectElasticSearch($elastic);
		}
		if (in_array('App\\Models\\Orm\\Mappers\\TranslatorTrait', $traits))
		{
			/** @var Translator $translator */
			$translator = $this->container->getByType(Translator::class);
			/** @var Mappers\TranslatorTrait $mapper */
			$mapper->injectTranslator($translator);
		}
		if (in_array('App\\Models\\Orm\\Mappers\\EventManagerTrait', $traits))
		{
			/** @var EventManager $eventManager */
			$eventManager = $this->container->getByType(EventManager::class);
			/** @var Mappers\EventManagerTrait $mapper */
			$mapper->injectEventManager($eventManager);
		}
		if (in_array('App\\Models\\Orm\\Mappers\\Neo4jTrait', $traits))
		{
			/** @var Neo4j $neo4j */
			$neo4j = $this->container->getByType(Neo4j::class);
			/** @var Mappers\Neo4jTrait $mapper */
			$mapper->injectNeo4j($neo4j);
		}
		if (in_array('App\\Models\\Orm\\Mappers\\QueueTrait', $traits))
		{
			/** @var Queue $queue */
			$queue = $this->container->getByType(Queue::class);
			/** @var Mappers\QueueTrait $mapper */
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
			if ($parent === 'App\\Models\\Orm\\Mappers\\Mapper')
			{
				break;
			}
		}

		return $traits;
	}

}
