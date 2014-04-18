<?php

namespace App\Presenters;

use App\Services\Translator;
use Monolog\Logger;
use Nette;
use App\Model\RepositoryContainer;


/**
 * @property-read RepositoryContainer $orm
 * @property-read Translator $translator
 * @property-read Logger $log
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

	public function getTranslator()
	{
		return $this->context->getByType('App\Services\Translator');
	}

	/**
	 * @return Logger
	 */
	public function getLog()
	{
		return $this->context->getService('log');
	}

	function beforeRender()
	{
		$this->template->setTranslator($this->translator);
	}

}
