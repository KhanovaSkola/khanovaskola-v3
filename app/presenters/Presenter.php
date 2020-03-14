<?php

namespace App\Presenters;

use App\Components\ControlTrait;
use App\Components\FormControl;
use App\Models\Orm\RepositoryContainer;
use App\Models\Rme;
use App\Models\Services\Inflection;
use App\Models\Services\Paths;
use App\Models\Services\Translator;
use App\Models\Services\UserState;
use App\Models\Structs\EventList;
use App\Models\Structs\LazyEntity;
use App\Models\Services\Locale;
use Kdyby\Events\EventManager;
use Kdyby\Events\Subscriber;
use Nette;
use Nette\Bridges\ApplicationLatte\Template;
use Nette\Caching\Cache;
use Nette\Caching\IStorage;
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

	/**
	 * @var IStorage
	 * @inject
	 */
	public $cacheStorage;

	/**
	 * @var Inflection
	 * @inject
	 */
	public $inflection;

	/**
	 * @var Paths
	 * @inject
	 */
	public $paths;

	/**
	 * AdWords Tracking code
	 * @persistent
	 */
	public $gclid;

  /** 
   * @var Locale 
   * @inject
   */
  public $locale;

	public function startup()
	{
		parent::startup();
		$this->translator->setLanguage($this->locale->getLocale());
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
	 * @return Rme\User|LazyEntity
	 */
	public function getUserEntity()
	{
		return $this->user->getUserEntity();
	}

	public function beforeRender()
	{
		parent::beforeRender();
		$this->registerFilters($this->template);
		$this->template->setTranslator($this->translator);
    // Setting language variable for Latte
    // Maybe we should rename it to locale, makes more sense
    $this->template->language = $this->locale->getLocale();

		$this->template->add('userEntity', $this->getUserEntity());
		$this->template->add('subjects', $this->orm->subjects->findAllButOldWeb());
		$this->template->add('oldSubjects', $this->orm->subjects->findAllOldWeb());
		$this->template->add('slug', $this->getParameter('slug'));

    // Show CS-KA link only on Homepage and Video page
    $this->template->showKALink = false;

		$this->setScripts();

		if (!$this->user->isRegisteredUser())
		{
			$section = $this->session->getSection('auth');
			/** @var self|Nette\Forms\Controls\TextInput[]|FormControl[] $this */
			$this['loginForm-form-email']->setDefaultValue($section->lastUser['email']);
			$this['loginForm']->setArgument('avatarUrl', $section->lastUser['avatar']);
		}

		$deploy = $this->context->parameters['wwwDir'] . '/deploy.txt';
		$hash = NULL;
		if (file_exists($deploy))
		{
			$hash = '-hashed-' . substr(md5(file_get_contents($deploy)), 0, 10);
		}
		$this->template->add('staticHash', $hash);

		$this->template->getRoundedContentCount = function() {
			$count = $this->orm->contents->findAll()->count();
			return round($count / 100) * 100;
		};
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
                $locale = $this->locale->getLocale();
                //$this->error("Language is ".$locale,403);
		$presenter = substr($name, strrpos(':' . $name, ':'));
		$dir = dirname($this->getReflection()->getFileName());
		$dir = is_dir("$dir/templates") ? $dir : dirname($dir);
		return [
			"$dir/templates/views/$presenter/$this->view.$locale.latte",
			"$dir/templates/views/$presenter.$this->view.$locale.latte",
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
		/** @var Rme\Content $content */
		$content = $this->orm->contents->getRandom();
		$block = $content->getRandomParent();
		$schema = $block ? $block->getRandomParent() : NULL;
		$this->redirectToEntity($content, $block, $schema);
	}

	/**
	 * @param string $tag
	 */
	public function purgeCacheTag($tag)
	{
		$cache = new Cache($this->cacheStorage);
		$cache->clean([
			Cache::TAGS => [$tag],
		]);
	}

	private function setScripts()
	{
		$current = preg_replace_callback('~\B[A-Z]~', function($m) {
			return '-' . strToLower($m[0]);
		}, $this->getAction(TRUE));
		$partials = explode(':', 'app' . strToLower($current));

		$scripts = [];
		$last = TRUE;
		for ($i = count($partials); $i > 0; $i--)
		{
			$script = [];
			for ($p = 0; $p < $i; $p++)
			{
				$script[] = $partials[$p];
			}
			if (!$last)
			{
				$script[] = '_all';
			}
			$scripts[] = implode('/', $script);
			$last = FALSE;
		}
		$jsDir = $this->paths->getJs();
		$existingScripts = [];
		foreach (array_reverse($scripts) as $script)
		{
			if (file_exists("$jsDir/$script.js"))
			{
				$existingScripts[] = $script;
			}
		}

		$this->template->scripts = Nette\Utils\Json::encode($existingScripts);
	}

}
