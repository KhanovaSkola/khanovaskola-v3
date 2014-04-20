<?php

namespace App\Presenters;

use App\Components\GistRenderer;
use App\DeprecatedException;
use App\InvalidArgumentException;
use App\Model\RepositoryContainer;
use App\Model\User;
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
 * @property-read User $userEntity
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter
{

	const FLASH_ERROR = 'danger';
	const FLASH_INFO = 'info';
	const FLASH_SUCCESS = 'success';

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

	/**
	 * @return User
	 */
	public function getUserEntity()
	{
		return $this->orm->users->getById($this->user->id);
	}

	public function beforeRender()
	{
		$this->template->setTranslator($this->translator);
	}

	public function createComponentGist()
	{
		return new GistRenderer();
	}

	public function flashError($key)
	{
		$this->flash($key, self::FLASH_ERROR);
	}

	public function flashInfo($key)
	{
		$this->flash($key, self::FLASH_INFO);
	}

	public function flashSuccess($key)
	{
		$this->flash($key, self::FLASH_SUCCESS);
	}

	private function flash($key, $type)
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
			'title' => $this->translator->translate("$key.title"),
			'message' => $this->translator->translate("$key.message"),
			'type' => $type,
		];
		$this->getTemplate()->flashes = $messages;
		$this->getPresenter()->getFlashSession()->$id = $messages;

		return $flash;
	}

	final public function flashMessage($message, $type = NULL, $title = NULL)
	{
		throw new DeprecatedException('Use flashError, flashInfo or flashSuccess instead');
	}

}
