<?php
namespace Clevis\Skeleton\Orm;

use App\Models\Orm\MapperFactory;
use App\Models\Services\HtmlPurifier;
use Nette;
use Nette\Caching\Cache;
use Orm;
use DibiConnection;


/**
 * Creates service container for RepositoryContainer.
 *
 * @author Jan Tvrdík
 *
 * @property-read Orm\IServiceContainer $container
 */
class ServiceContainerFactory extends Nette\Object implements Orm\IServiceContainerFactory
{

	/** @var DibiConnection */
	private $dibiConnection;

	/** @var Cache */
	private $cache;

	/** @var Nette\DI\Container */
	private $container;

	/** @var \App\Services\HtmlPurifier */
	private $purifier;

	/**
	 * @param DibiConnection
	 * @param Cache|NULL cache for Orm\PerformanceHelper or null to disable the cache
	 */
	public function __construct(DibiConnection $dibiConnection, HtmlPurifier $purifier, Cache $cache = NULL, Nette\DI\Container $container)
	{
		$this->dibiConnection = $dibiConnection;
		$this->cache = $cache;
		$this->container = $container;
		$this->purifier = $purifier;
	}

	/**
	 * @return Orm\IServiceContainer
	 */
	public function getContainer()
	{
		$container = new Orm\ServiceContainer();
		$container->addService('annotationsParser', 'Orm\AnnotationsParser');
		$container->addService('annotationClassParser', array($this, 'createAnnotationClassParser'));
		$container->addService('mapperFactory', array($this, 'createMapperFactory'));
		$container->addService('repositoryHelper', 'Orm\RepositoryHelper');
		$container->addService('dibi', $this->dibiConnection);
		$container->addService('purifier', $this->purifier);
		$container->addService('container', $this->container);

		if ($this->cache !== NULL)
		{
			$container->addService('performanceHelperCache', $this->cache);
		}

		return $container;
	}

	/**
	 * @internal
	 * @param  Orm\IServiceContainer
	 * @return Orm\IMapperFactory
	 */
	public function createMapperFactory(Orm\IServiceContainer $container)
	{
		return new MapperFactory($container->getService('annotationClassParser', 'Orm\AnnotationClassParser'), $this->container);
	}

	/**
	 * @internal
	 * @param  Orm\IServiceContainer
	 * @return Orm\AnnotationClassParser
	 */
	public function createAnnotationClassParser(Orm\IServiceContainer $container)
	{
		return new Orm\AnnotationClassParser($container->getService('annotationsParser', 'Orm\AnnotationsParser'));
	}

}
