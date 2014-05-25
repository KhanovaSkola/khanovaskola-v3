<?php

namespace App\Components;

use App\Services\Translator;
use Nette\Application\UI\ITemplateFactory;
use Nette\Bridges\ApplicationLatte\Template;


abstract class Control extends \Nette\Application\UI\Control
{

	use ControlTrait;

	/** @var Template */
	public $template;

	/** @var Translator */
	public $translator;

	public function __construct(Translator $translator, ITemplateFactory $templateFactory)
	{
		$this->template = $templateFactory->createTemplate($this);
		$this->translator = clone $translator;
	}

	protected function attached($presenter)
	{
		parent::attached($presenter);
		$this->translator->setPrefix($this->getName() . '.');
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
