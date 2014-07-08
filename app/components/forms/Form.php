<?php

namespace App\Components\Forms;

use App\Presenters\Presenter;
use Kdyby\Replicator\Container;
use Nette;
use Nette\Application\UI\Form as NForm;


/**
 * Differences to NForm
 * - addSubmit name is optional
 *
 * @property-read Presenter $presenter
 * @method Container addDynamic(string $name, callable $cb)
 */
abstract class Form extends NForm
{

	public function __construct()
	{
		parent::__construct();

		$this->onSuccess[] = [$this, 'onSuccess'];

		$this->setup();
	}

	abstract public function setup();

	abstract public function onSuccess();

	/**
	 * @param NULL|string $name
	 * @param NULL|string $caption
	 * @return \Nette\Forms\Controls\SubmitButton
	 */
	public function addSubmit($name = NULL, $caption = NULL)
	{
		return parent::addSubmit($name ?: 'save', $caption);
	}

}
