<?php

namespace App\Components;

use Nette\Bridges\ApplicationLatte\Template;


abstract class Control extends \Nette\Application\UI\Control
{

	/** @var Template */
	protected $template;

	protected function attached($presenter)
	{
		parent::attached($presenter);
		$this->template = $this->presenter->getTemplateFactory()->createTemplate($this);
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
		$this->template->render($this->getTemplateFile($view));
	}

	public function beforeRender()
	{
	}

}
