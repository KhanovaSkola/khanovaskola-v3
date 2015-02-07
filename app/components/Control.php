<?php

namespace App\Components;

use App\ImplementationException;
use App\Models\Services\Translator;
use Nette\Application\UI\Control as NControl;
use Nette\Bridges\ApplicationLatte\Template;
use Nette\DI\Container;
use Nette\Reflection\Method;


/**
 * Unlike NControl this class has support for custom rendering methods
 * that automatically set template file.
 * - `renderDefault` is invoked by both {control foo} and {control foo:default}
 * - `renderBar` is invoked by {control foo:bar}
 * - `render` method handles the method magic and should never be called directly.
 * Render* methods must be declared as protected, otherwise the render method will
 * never be called. This is enforced in constructor.
 *
 * Controls under App\Controls namespace do not need factories in Presenter
 * as they are invoked dynamically.
 *
 * @property-read Template $template
 */
abstract class Control extends NControl
{

	use ControlTrait;

	/**
	 * @var Container
	 * @inject
	 */
	public $context;

	/**
	 * @var Translator
	 * @inject
	 */
	public $translator;

	public function __construct()
	{
		parent::__construct();

		foreach ($this->getReflection()->getMethods(Method::IS_PUBLIC) as $method)
		{
			$m = $method->getShortName();
			if ($m !== 'render' && strpos($m, 'render') === 0)
			{
				$class = get_class($this);
				throw new ImplementationException("Method '$class::$m' must have protected visibility.");
			}
		}
	}

	final public function render()
	{
		$args = func_get_args();
		call_user_func([$this, 'wrapRender'], 'default', $args);
	}

	private function wrapRender($view = 'default', array $args = [])
	{
		$this->template->setFile($this->getTemplateFile($view));

		$method = "render$view";
		if (method_exists($this, $method))
		{
			call_user_func_array([$this, $method], $args);
		}

		$this->registerFilters($this->template);
		$this->template->setTranslator($this->translator->getPrefixed($this->getName()));
		$this->template->render();
	}

	public function __call($name, $args)
	{
		if (strpos($name, 'render') !== 0)
		{
			return parent::__call($name, $args);
		}

		$this->wrapRender(lcFirst(substr($name, 6)));
		return NULL;
	}

	protected function getTemplateFile($view = NULL)
	{
		$name = lcFirst($this->getReflection()->getShortName());
		if ($view && $view !== 'default')
		{
			$name .= ".$view";
		}
		return __DIR__ . "/../templates/controls/$name.latte";
	}

	public function getHtmlId()
	{
		return $this->getUniqueId();
	}

}
