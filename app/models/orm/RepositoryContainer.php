<?php

namespace App\Models\Orm;

use App\Models\Rme;
use Clevis\Skeleton;
use Nette\Caching\Cache;
use Nette\Caching\IStorage;
use Nette\DI\Container;


/**
 * @property-read Rme\AnswersRepository $answers
 * @property-read Rme\BadgesRepository $badges
 * @property-read Rme\BadgeUserBridgesRepository $badgeUserBridges
 * @property-read Rme\BlockLinksRepository $blockLinks
 * @property-read Rme\BlocksRepository $blocks
 * @property-read Rme\BlueprintsRepository $blueprints
 * @property-read Rme\CommentsRepository $comments
 * @property-read Rme\GistsRepository $gists
 * @property-read Rme\PathsRepository $paths
 * @property-read Rme\StudentInvitesRepository $studentInvites
 * @property-read Rme\TagsRepository $tags
 * @property-read Rme\TokensRepository $tokens
 * @property-read Rme\UnsubscribesRepository $unsubscribes
 * @property-read Rme\UsersRepository $users
 * @property-read Rme\VideosRepository $videos
 * @property-read Rme\VideoViewsRepository $videoViews
 * @property-read Rme\SchemasRepository $schemas
 */
class RepositoryContainer extends Skeleton\Orm\RepositoryContainer
{

	/**
	 * @var Cache
	 */
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
