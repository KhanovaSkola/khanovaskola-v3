<?php

namespace App\Model;

use App\Services\ElasticSearch;
use App\Services\Translator;
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
		/** @var Translator $translator */
		$translator = $this->container->getService('translator');

		if ($repository instanceof VideosRepository)
		{
			/** @var ElasticSearch $elastic */
			$elastic = $this->container->getService('elastic');
			return new VideosMapper($repository, $translator, $elastic);
		}

		$class = $this->getMapperClass($repository);
		return new $class($repository, $translator);
	}

}
