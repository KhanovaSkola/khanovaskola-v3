<?php

namespace App\Presenters;

use App\Components\ControlTrait;
use App\Models\EventList;
use App\Models\Orm\RepositoryContainer;
use App\Models\Rme\BadgeUserBridge;
use App\Models\Rme\User;
use App\Models\Services\Translator;
use Kdyby\Events\EventManager;
use Kdyby\Events\Subscriber;
use Monolog\Logger;
use Nette;
use Nette\Http\Session;
use Nette\Templating\FileTemplate;


/**
 * @property-read FileTemplate $template
 * @property-read User $userEntity
 */
abstract class Presenter extends Nette\Application\UI\Presenter implements Subscriber
{

	use ControlTrait;

	/** @var RepositoryContainer @inject */
	public $orm;

	/** @var Translator @inject */
	public $translator;

	/** @var EventManager @inject */
	public $eventManager;

	/** @var Logger @inject */
	public $log;

	/** @var Session @inject */
	public $session;

	public function startup()
	{
		parent::startup();
		$this->translator->setLanguage('cs');
		$this->eventManager->addEventSubscriber($this);
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

	public function beforeRender()
	{
		parent::beforeRender();
		$this->template->setTranslator($this->translator);
		$this->template->userEntity = $this->userEntity;
	}

	public function redirectToAuth()
	{
		$this->session->getSection('auth')->loginBacklink = $this->storeRequest();

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

	public function formatTemplateFiles()
	{
		$name = $this->getName();
		$presenter = substr($name, strrpos(':' . $name, ':'));
		$dir = dirname($this->getReflection()->getFileName());
		$dir = is_dir("$dir/templates") ? $dir : dirname($dir);
		return [
			"$dir/templates/views/$presenter/$this->view.latte",
			"$dir/templates/views/$presenter.$this->view.latte",
		];
	}

	public function formatLayoutTemplateFiles()
	{
		$name = $this->getName();
		$presenter = substr($name, strrpos(':' . $name, ':'));
		$layout = $this->layout ? $this->layout : 'layout';
		$dir = dirname($this->getReflection()->getFileName());
		$dir = is_dir("$dir/templates/views") ? $dir : dirname($dir);
		$list = [
			"$dir/templates/views/$presenter/@$layout.latte",
			"$dir/templates/views/$presenter.@$layout.latte",
		];
		do {
			$list[] = "$dir/templates/views/@$layout.latte";
			$dir = dirname($dir);
		} while ($dir && ($name = substr($name, 0, strrpos($name, ':'))));
		return $list;
	}

}