<?php

namespace App\Presenters;

use App\Components\GistRenderer;
use App\Model\RepositoryContainer;
use App\Services\Translator;
use Kdyby\Events\EventManager;
use Monolog\Logger;
use Nette;


/**
 * @property-read RepositoryContainer $orm
 * @property-read Translator $translator
 * @property-read Logger $log
 * @property-read EventManager $eventManager
 * @property-read Nette\Templating\FileTemplate $template
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter
{

	public function startup()
	{
		parent::startup();
		$this->translator->setLanguage('cs');
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
	public function getEventManager()
	{
		return $this->context->getByType('Kdyby\Events\EventManager');
	}

	/**
	 * @return Logger
	 */
	public function getLog()
	{
		return $this->context->getService('log');
	}

	public function beforeRender()
	{
		$this->template->setTranslator($this->translator);
	}

	public function createComponentGist()
	{
		return new GistRenderer();
	}

}
