<?php

namespace App\Presenters;

use App\Components\FormControl;
use App\Components\Forms;
use App\Models\Rme;
use App\Presenters\Parameters;


final class BlueprintEditor extends Presenter
{

	use Parameters\Blueprint;

	public function startup()
	{
		parent::startup();

		if (!$this->user->isRegisteredUser())
		{
			$this->redirectToAuthOrRegister();
		}

		$this->loadBlueprint();
	}

	public function createComponentBlueprintEditor()
	{
		return $this->buildComponent(FormControl::class, [Forms\Blueprint::class, $this->blueprint]);
	}

}
