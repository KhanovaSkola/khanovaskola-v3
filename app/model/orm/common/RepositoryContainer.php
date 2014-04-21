<?php

namespace App\Model;

use Clevis\Skeleton;
use Nette\Caching\Cache;
use Nette\DI\Container;


/**
 * @property-read GistsRepository $gists
 * @property-read UsersRepository $users
 * @property-read VideosRepository $videos
 */
class RepositoryContainer extends Skeleton\Orm\RepositoryContainer
{

	/** @var \Nette\Caching\Cache */
	protected $cache;

	public function __construct($containerFactory = NULL, $repositories = [], Container $container = NULL)
	{
		parent::__construct($containerFactory, $repositories);
		$this->cache = new Cache($container->getService('cacheStorage'));
	}

	/**
	 * @return Cache
	 */
	public function getCache()
	{
		return $this->cache;
	}

}
