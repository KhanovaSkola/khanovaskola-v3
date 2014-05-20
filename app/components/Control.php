<?php

namespace App\Components;

use App\Presenters\BasePresenter;
use App\Services\Translator;
use Nette\Bridges\ApplicationLatte\Template;


abstract class Control extends \Nette\Application\UI\Control
{

	use FlashTrait;

	/** @var Template */
	protected $template;

	/** @var Translator */
	protected $translator;

	/**
	 * @param BasePresenter $presenter
	 */
	protected function attached($presenter)
	{
		parent::attached($presenter);
		$this->template = $presenter->getTemplateFactory()->createTemplate($this);
		$this->translator = $presenter->translator;
	}

	protected function getTemplateFile($view)
	{
		return dirname($this->reflection->fileName) . "/$view.latte";
	}

	public function __call($name, $args)
	{
		if (strpos($name, 'render') === 0)
		{
			$view = $name === 'render' ? 'default' : substr($name, strlen('render'));
			$this->render($view, $args);
			return NULL;
		}
		else
		{
			return parent::__call($name, $args);
		}
	}

	final protected function render($view, array $args)
	{
		$method = 'render' . ucFirst($view);

		$this->beforeRender();

		if (method_exists($this, $method))
		{
			call_user_func_array([$this, $method], $args);
		}

		$this->template->setTranslator($this->translator);
		$this->template->render($this->getTemplateFile($view));
	}

	public function beforeRender()
	{
	}

}
