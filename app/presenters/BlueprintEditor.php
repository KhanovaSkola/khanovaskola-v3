<?php

namespace App\Presenters;

use App\Components\FormControl;
use App\Components\Forms;
use App\Models\Rme;


final class BlueprintEditor extends Presenter
{

	/**
	 * @var NULL|int
	 * @persistent
	 */
	public $blueprintId;

	/**
	 * @var NULL|Rme\Blueprint
	 */
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
