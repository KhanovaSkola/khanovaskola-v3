<?php

namespace App\Presenters;

use App\Components\BlueprintForm;
use App\Rme\Blueprint;


final class BlueprintEditorPresenter extends BasePresenter
{

	/**
	 * @var int|NULL
	 * @persistent
	 */
	public $blueprintId;

	/** @var Blueprint|NULL */
	protected $blueprint;

	public function startup()
	{
		parent::startup();

		if ($this->blueprintId && ! $this->blueprint = $this->orm->blueprints->getById($this->blueprintId))
		{
			$this->error();
		}
	}

	public function createComponentEditor()
	{
		$form = new BlueprintForm($this->translator, $this->getTemplateFactory());
		$form->setEntity($this->blueprint);
		$form->injectBlueprints($this->orm->blueprints);
		return $form;
	}

}
