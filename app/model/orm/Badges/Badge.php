<?php

namespace App\Model;


use App\NotSupportedException;
use App\Services\Translator;
use Kdyby\Events\Subscriber;
use Nette\Reflection\ClassType;
use Orm;


/**
 * @property string $key title and description translation, image {default getKey()}
 *
 * @property Orm\OneToMany $badgeUserBridges {1:m badgeUserBridges $badge}
 */
abstract class Badge extends Entity implements Subscriber
{

	/** @var RepositoryContainer */
	private $orm;

	public function __construct(RepositoryContainer $container)
	{
		parent::__construct();
		$this->orm = $container;
	}

	/**
	 * @return array
	 */
	final public function getSubscribedEvents()
	{
		$list = [];
		$ref = new ClassType($this);
		foreach ($ref->getMethods() as $method)
		{
			if ($method->getAnnotation('subscribe'))
			{
				$list[] = $method->name;
			}
		}

		return $list;
	}

	final public static function getKey()
	{
		$name = get_called_class();
		$short = substr($name, strrpos($name, '\\') + 1);
		$short = str_replace('Badge', '', $short);
		return $short;
	}

	/**
	 * @throws \App\NotSupportedException
	 */
	final public function setKey()
	{
		throw new NotSupportedException('Key is set automatically from ::getKey()');
	}

	/**
	 * @param User $user
	 * @param callable $createBridge
	 * @return BadgeUserBridge
	 */
	public function awardTo(User $user, callable $createBridge)
	{
		$badge = $this->orm->badges->getByKey($this->key);

		$bridge = $createBridge($badge, $user);
		$this->orm->badgeUserBridges->attach($bridge);

		return $bridge;
	}

}
