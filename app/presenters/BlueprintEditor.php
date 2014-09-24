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

		if (!$this->user->isRegisteredUser())
		{
			$this->redirectToAuthOrRegister();
		}

		$this->blueprint = $this->orm->contents->getBlueprintById($this->blueprintId);
		if ($this->blueprintId && !$this->blueprint)
		{
			$this->error();
		}
	}

	public function createComponentBlueprintEditor()
	{
		return $this->buildComponent(FormControl::class, [Forms\Blueprint::class, $this->blueprint]);
	}

}
