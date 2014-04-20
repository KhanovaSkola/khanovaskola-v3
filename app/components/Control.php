<?php

namespace App\Components;

use Nette\Latte\Engine;
use Nette\Templating\FileTemplate;


/**
 * @property-read FileTemplate $template
 */
abstract class Control extends \Nette\Application\UI\Control
{

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
		$this->template->setFile($this->getTemplateFile($view));

		$latte = new Engine;
		$this->template->registerFilter($latte);

		if (method_exists($this, $method))
		{
			call_user_func_array([$this, $method], $args);
		}
		$this->template->render();
	}

	public function beforeRender()
	{
	}

}
