<?php

namespace App\Presenters;

use App\Components\FormControl;
use App\Components\Forms;
use App\Models\Rme;


final class BlueprintEditor extends Presenter
{

	/**
	 * @var int|NULL
	 * @persistent
	 */
	public $blueprintId;

	/** @var Rme\Blueprint|NULL */
	protected $blueprint;

	public function startup()
	{
		parent::startup();

		if ($this->blueprintId && ! $this->blueprint = $this->orm->blueprints->getById($this->blueprintId))
		{
			$this->error();
		}
	}

	public function createComponentBlueprintEditor()
	{
		return $this->buildComponent(FormControl::class, [Forms\Blueprint::class, $this->blueprint]);
	}

}
