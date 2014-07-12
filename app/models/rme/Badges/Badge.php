<?php

namespace App\Models\Rme;

use App\Models\Orm\Entity;
use App\Models\Orm\RepositoryContainer;
use App\Models\Services\Translator;
use App\Models\Structs\EventList;
use App\NotSupportedException;
use Exception;
use Kdyby\Events\EventArgsList;
use Kdyby\Events\EventManager;
use Kdyby\Events\Subscriber;
use Nette\Reflection\ClassType;
use Orm;
use Orm\OneToMany as OtM;


/**
 * @property string                $key              title and description translation, image {default getKey()}
 *
 * @property OtM|BadgeUserBridge[] $badgeUserBridges {1:m badgeUserBridges $badge}
 */
abstract class Badge extends Entity implements Subscriber
{

	/**
	 * @var EventManager
	 */
	private $eventManager;

	/**
	 * @var Translator
	 */
	protected $translator;

	/**
	 * @var RepositoryContainer
	 */
	private $orm;

	public function __construct(RepositoryContainer $container, EventManager $eventManager, Translator $translator)
	{
		parent::__construct();
		$this->orm = $container;
		$this->eventManager = $eventManager;
		$this->translator = $translator;
	}

	public function injectEventManager(EventManager $eventManager)
	{
		$this->eventManager = $eventManager;
	}

	public function injectTranslator(Translator $translator)
	{
		$this->translator = $translator;
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
	 * @throws Exception
	 * @return BadgeUserBridge
	 */
	public function awardTo(User $user, callable $createBridge)
	{
		$badge = $this->orm->badges->getByKey($this->key);
		/** @var BadgeUserBridge $bridge */
		$bridge = $createBridge($badge, $user);
		$bridge->injectTranslator($badge->translator);
		$this->orm->badgeUserBridges->attach($bridge);

		$this->eventManager->dispatchEvent(EventList::BADGE_AWARDED, new EventArgsList([$bridge]));

		return $bridge;
	}

}
