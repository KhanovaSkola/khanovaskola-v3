<?php

namespace App\Presenters;

use App\Components\ControlTrait;
use App\Models\Orm\RepositoryContainer;
use App\Models\Rme;
use App\Models\Services\Translator;
use App\Models\Services\UserState;
use App\Models\Structs\EventList;
use App\Models\Structs\LazyEntity;
use Kdyby\Events\EventManager;
use Kdyby\Events\Subscriber;
use Nette;
use Nette\Bridges\ApplicationLatte\Template;
use Nette\Http\Session;


/**
 * @property-read Template $template
 * @property-read UserState $user
 * @property-read Rme\User $userEntity
 */
abstract class Presenter extends Nette\Application\UI\Presenter implements Subscriber
{

	use ControlTrait;


	/**
	 * @var RepositoryContainer
	 * @inject
	 */
	public $orm;

	/**
	 * @var Translator
	 * @inject
	 */
	public $translator;

	/**
	 * @var EventManager
	 * @inject
	 */
	public $eventManager;

	/**
	 * @var Session
	 * @inject
	 */
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

	public function onBadgeAwarded(Rme\BadgeUserBridge $bridge)
	{
		$this->flashSuccess('badges.awarded', [
			'badge' => $bridge->title
		]);
	}

	/**
	 * @throws \Exception from persist
	 * @return Rme\User
	 */
	public function getUserEntity()
	{
		/** @var Presenter $this */
		$userEntity = $this->orm->users->getById($this->user->id);

		if (!$this->user->isEphemeralGuest() && !$userEntity)
		{
			// user was deleted from database
			$this->user->logout(TRUE);
		}

		if (!$userEntity)
		{
			$storage = $this->user->storage;

			$userEntity = new LazyEntity(function() use ($storage) {
				$user = new Rme\User();
				$user->registered = FALSE;

				$this->orm->users->persist($user);

				$storage->setIdentity(new Nette\Security\Identity($user->id));
				return $user;
			});

			$storage->setAuthenticated(FALSE);
		}

		return $userEntity;
	}

	public function beforeRender()
	{
		parent::beforeRender();
		$this->registerFilters($this->template);
		$this->template->setTranslator($this->translator);
		$this->template->add('userEntity', $this->getUserEntity());
		$this->template->add('subjects', $this->orm->subjects->findAll());

		$deploy = $this->context->parameters['wwwDir'] . '/deploy.txt';
		$hash = NULL;
		if (file_exists($deploy))
		{
			$hash = '-' . substr(md5(file_get_contents($deploy)), 0, 10);
		}
		$this->template->add('staticHash', $hash);
	}

	/**
	 * Denies access for persisted guest users and redirects
	 * to registration. Ephemeral guest users are send to auth.
	 */
	public function redirectToAuthOrRegister()
	{
		if ($this->user->isPersistedGuest())
		{
			$this->redirectToRegistration();
		}
		$this->redirectToAuth();
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

	public function redirectToRegistration()
	{
		$this->session->getSection('auth')->loginBacklink = $this->storeRequest();
		$this->redirect('Auth:registration');
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

	public function actionRandomContent()
	{
		// TODO redirect to one of most watched videos
		// or if user is logged in, redirect to next video of last watched

		/** @var Rme\Content $content */
		$content = $this->orm->contents->findAll()->applyLimit(1, mt_rand(1, 20))->fetch(); // TODO make it random
		$block = $content->getRandomParent();
		$schema = $block ? $block->getRandomParent() : NULL;
		$this->redirectToEntity($content, $block, $schema);
	}

	/**
	 * Marks page cacheable in Varnish.
	 * Due to Nette limitations this must be called in render method.
	 */
	protected function setCacheControlPublic()
	{
		$resp = $this->getHttpResponse();
		$resp->setHeader('Cache-Control', 'public');
		$resp->setHeader('Expires', NULL);
		$resp->setHeader('Pragma', NULL);
		$resp->setHeader('Set-Cookie', NULL);
	}

}
