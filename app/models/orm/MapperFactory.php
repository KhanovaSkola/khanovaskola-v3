<?php

namespace App\Models\Orm;

use App\Models\Orm\Mappers;
use App\Models\Services\ElasticSearch;
use App\Models\Services\Queue;
use App\Models\Services\Translator;
use Kdyby\Events\EventManager;
use Nette\DI\Container;
use Orm\AnnotationClassParser;
use Orm\IMapper;
use Orm\IRepository;


class MapperFactory extends \Orm\MapperFactory
{

	/**
	 * @var Container
	 */
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
		$this->container->callInjects($mapper);
		$mapper->registerEvents($repository->getEvents());

		return $mapper;
	}

	private function getTraits($class)
	{
		$traits = class_uses($class);
		foreach (class_parents($class) as $parent)
		{
			$traits = array_merge($traits, class_uses($parent));
			if ($parent === Mappers\Mapper::class)
			{
				break;
			}
		}

		return $traits;
	}

}
