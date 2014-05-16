<?php

namespace App\Rme;

use Clevis\Skeleton;
use Nette\Caching\Cache;
use Nette\Caching\IStorage;
use Nette\DI\Container;


/**
 * @property-read AnswersRepository $answers
 * @property-read BadgesRepository $badges
 * @property-read BadgeUserBridgesRepository $badgeUserBridges
 * @property-read BlueprintsRepository $blueprints
 * @property-read GistsRepository $gists
 * @property-read PathsRepository $paths
 * @property-read TagsRepository $tags
 * @property-read UsersRepository $users
 * @property-read VideosRepository $videos
 */
class RepositoryContainer extends Skeleton\Orm\RepositoryContainer
{

	/** @var \Nette\Caching\Cache */
	protected $cache;

	public function __construct($containerFactory = NULL, Container $container = NULL)
	{
		parent::__construct($containerFactory);
		/** @var IStorage $storage */
		$storage = $container->getService('cacheStorage');
		$this->cache = new Cache($storage);
	}

	public function getByEntityName($name)
	{
		$alias = [
			'blueprint' => 'blueprints',
			'video' => 'videos',
		];
		return $this->{$alias[strToLower($name)]};
	}

	/**
	 * @return Cache
	 */
	public function getCache()
	{
		return $this->cache;
	}

}
