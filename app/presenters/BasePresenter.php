<?php

namespace App\Presenters;

use App\Components\ColumnChart;
use App\Components\GistRenderer;
use App\Components\Search;
use App\DeprecatedException;
use App\InvalidArgumentException;
use App\Model\EventList;
use App\Orm\ContentEntity;
use App\Rme\BadgeUserBridge;
use App\Rme\Blueprint;
use App\Rme\RepositoryContainer;
use App\Rme\User;
use App\Services\Translator;
use Kdyby\Events\EventArgsList;
use Kdyby\Events\EventManager;
use Kdyby\Events\Subscriber;
use Monolog\Logger;
use Nette;
use Nette\Application\UI\destination;
use Nette\Application\UI\InvalidLinkException;
use Nette\Application\UI\Presenter;
use Nette\Http\Session;
use Nette\Templating\FileTemplate;


/**
 * @property-read RepositoryContainer $orm
 * @property-read Translator $translator
 * @property-read Logger $log
 * @property-read Nette\Templating\FileTemplate $template
 * @property-read User $userEntity
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter implements Subscriber
{

	const FLASH_ERROR = 'danger';
	const FLASH_INFO = 'info';
	const FLASH_SUCCESS = 'success';

	public function startup()
	{
		parent::startup();
		$this->translator->setLanguage('cs');
		$this->getEventManager()->addEventSubscriber($this);
	}

	public function getSubscribedEvents()
	{
		return [EventList::BADGE_AWARDED];
	}

	public function onBadgeAwarded(BadgeUserBridge $bridge)
	{
		$this->flashSuccess('badges.awarded', [
			'badge' => $bridge->title
		]);
	}

	/**
	 * @return RepositoryContainer
	 */
	public function getOrm()
	{
		return $this->context->getService('orm');
	}

	/**
	 * @return Translator
	 */
	public function getTranslator()
	{
		return $this->context->getByType('App\Services\Translator');
	}

	/**
	 * @return EventManager
	 */
	private function getEventManager()
	{
		return $this->context->getByType('Kdyby\Events\EventManager');
	}

	/**
	 * Does not flush automatically!
	 * @param $event
	 * @param array $args
	 */
	protected function trigger($event, array $args = [])
	{
		$this->getEventManager()->dispatchEvent($event, new EventArgsList($args));
	}

	/**
	 * @return Logger
	 */
	public function getLog()
	{
		return $this->context->getService('log');
	}

	/**
	 * @return User
	 */
	public function getUserEntity()
	{
		$userEntity = $this->orm->users->getById($this->user->id);
		if ($this->user->loggedIn && !$userEntity)
		{
			$this->user->logout(TRUE);
		}

		return $userEntity;
	}

	public function link($destination, $args = [])
	{
		if ($destination instanceof ContentEntity)
		{
			$presenter = $type = $destination->getShortEntityName();
			$param = lcFirst($type) . 'Id';
			return parent::link("$presenter:", [$param => $destination->id]);
		}
		return parent::link($destination, $args);
	}

	public function beforeRender()
	{
		parent::beforeRender();
		$this->template->setTranslator($this->translator);
		$this->template->userEntity = $this->userEntity;
	}

	public function createComponentGist()
	{
		return new GistRenderer();
	}

	public function createComponentSearch()
	{
		return new Search();
	}

	public function createComponentColumnChart()
	{
		return new ColumnChart();
	}

	public function redirectToAuth()
	{
		/** @var Session $session */
		$session = $this->context->getService('session');
		$session->getSection('auth')->loginBacklink = $this->storeRequest();

		if ($this->user->getLogoutReason() === Nette\Security\IUserStorage::INACTIVITY)
		{
			$this->flashInfo('auth.reason.inactivity');
		}
		else
		{
			$this->flashInfo('auth.reason.generic');
		}
		$this->redirect('Auth:in');
	}

	public function flashError($key, $count = NULL, array $args = [])
	{
		$this->flash($key, $count, $args, self::FLASH_ERROR);
	}

	public function flashInfo($key, $count = NULL, array $args = [])
	{
		$this->flash($key, $count, $args, self::FLASH_INFO);
	}

	public function flashSuccess($key, $count = NULL, array $args = [])
	{
		$this->flash($key, $count, $args, self::FLASH_SUCCESS);
	}

	private function flash($key, $count = NULL, array $args = [], $type = NULL)
	{
		if (!in_array($type, [
			self::FLASH_ERROR,
			self::FLASH_INFO,
			self::FLASH_SUCCESS,
		]))
		{
			throw new InvalidArgumentException;
		}

		$id = $this->getParameterId('flash');
		$messages = $this->getPresenter()->getFlashSession()->$id;
		$messages[] = $flash = (object) [
			'title' => $this->translator->translate("$key.title", $count, $args),
			'message' => $this->translator->translate("$key.message", $count, $args),
			'type' => $type,
		];
		$this->getTemplate()->flashes = $messages;
		$this->getPresenter()->getFlashSession()->$id = $messages;

		return $flash;
	}

	/**
	 * @deprecated
	 */
	final public function flashMessage($message, $type = NULL, $title = NULL)
	{
		throw new DeprecatedException('Use flashError, flashInfo or flashSuccess instead');
	}

}
