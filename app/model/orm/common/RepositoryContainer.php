<?php

namespace App\Model;

use Clevis\Skeleton;
use Nette\Caching\Cache;
use Nette\Caching\IStorage;
use Nette\DI\Container;


/**
 * @property-read BadgesRepository $badges
 * @property-read BadgeUserBridgesRepository $badgeUserBridges
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
		/** @var IStorage $storage */
		$storage = $container->getService('cacheStorage');
		$this->cache = new Cache($storage);
	}

	/**
	 * @return Cache
	 */
	public function getCache()
	{
		return $this->cache;
	}

}
