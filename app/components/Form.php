<?php

namespace App\Components;

use Kdyby\Replicator\Container;
use Nette;
use Nette\Forms\Controls;


/**
 * @method Container addDynamic(\string $name, callable $cb)
 */
class Form extends Nette\Application\UI\Form
{

	public function addSubmit($name = NULL, $caption = NULL)
	{
		if (!$name)
		{
			$name = 'send';
		}
		return parent::addSubmit($name, $caption);
	}

	public function render()
	{
		$renderer = $this->getRenderer();
		$renderer->wrappers['controls']['container'] = NULL;
		$renderer->wrappers['pair']['container'] = 'div class=form-group';
		$renderer->wrappers['pair']['.error'] = 'has-error';
		$renderer->wrappers['control']['container'] = 'div class=col-sm-9';
		$renderer->wrappers['label']['container'] = 'div class="col-sm-3 control-label"';
		$renderer->wrappers['control']['description'] = 'span class=help-block';
		$renderer->wrappers['control']['errorcontainer'] = 'span class=help-block';

		$this->getElementPrototype()->class('form-horizontal');

		foreach ($this->getControls() as $control)
		{
			if ($control instanceof Controls\Button)
			{
				$control->getControlPrototype()->addClass(empty($usedPrimary) ? 'btn btn-primary' : 'btn btn-default');
				$usedPrimary = TRUE;

			}
			else if ($control instanceof Controls\TextBase || $control instanceof Controls\SelectBox || $control instanceof Controls\MultiSelectBox)
			{
				$control->getControlPrototype()->addClass('form-control');

			}
			else if ($control instanceof Controls\Checkbox || $control instanceof Controls\CheckboxList || $control instanceof Controls\RadioList)
			{
				$control->getSeparatorPrototype()->setName('div')->addClass($control->getControlPrototype()->type);
			}
		}

		parent::render();
	}

}
