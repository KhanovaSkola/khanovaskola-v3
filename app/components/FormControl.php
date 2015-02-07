<?php

namespace App\Components;

use App\Components\Forms\Form;
use App\InvalidArgumentException;
use Nette\DI\Container;
use Nette\Reflection\ClassType;


/**
 * Wraps forms and sets template path. Allows custom form rendering.
 *
 * Forms under App\Controls\Forms namespace do not need factories in Presenter
 * as they are invoked dynamically by requesting `FooForm` control.
 *
 * Example:
 *  Requesting {control fooForm} creates new FormControl with App\Controls\Forms\Foo class
 */
class FormControl extends Control
{

	/**
	 * @var string class
	 */
	private $formClass;

	/**
	 * @var Container
	 * @inject
	 */
	public $container;

	/**
	 * @var array
	 */
	private $args = [];

	/**
	 * @param string $formClass
	 */
	public function __construct($formClass)
	{
		if (!class_exists($formClass))
		{
			throw new InvalidArgumentException("Class $formClass does not exist.");
		}
		parent::__construct();

		$args = func_get_args();
		array_shift($args);
		$this->args = $args;

		$this->formClass = $formClass;
	}

	public function setArgument($arg, $value)
	{
		$this->args[$arg] = $value;
	}

	public function createComponentForm()
	{
		/** @var Form $form */
		$form = $this->buildComponent($this->formClass, $this->args);
		$form->setTranslator($this->translator->getPrefixed($this->getName()));
		$form->setup();
		return $form;
	}

	protected function renderDefault()
	{
		$this->template->setParameters($this->args);
		$this->template->form = $this['form'];
	}

	protected function getTemplateFile($view = NULL)
	{
		$name = lcFirst(ClassType::from($this->formClass)->getShortName());
		return __DIR__ . "/../templates/forms/$name.latte";
	}

}
