<?php

namespace App\Model;

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
	 * @param IRepository
	 * @return IMapper
	 */
	public function createMapper(IRepository $repository)
	{
		if ($repository instanceof EventsRepository)
		{
			return new EventsMapper($repository, $this->container->getByType('Elasticsearch\Client'));
		}

		$class = $this->getMapperClass($repository);
		return new $class($repository);
	}

}
