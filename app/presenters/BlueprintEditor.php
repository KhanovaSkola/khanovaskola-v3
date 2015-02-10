<?php

namespace App\Presenters;

use App\Components\FormControl;
use App\Components\Forms;
use App\Models\Rme;
use App\Models\Services\Acl;
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

		$this->loadBlueprint(function() {
			return NULL;
		});

		if (!($this->user->isAllowed(Acl::ADD_CONTENT) || ($this->blueprint && $this->user->isAllowed($this->blueprint))))
		{
			$this->flashError('acl.denied.blueprint');
			$this->redirect('Homepage:default');
		}
	}

	public function renderDefault()
	{
		$this->template->blueprint = $this->blueprint;
	}

	public function createComponentBlueprintEditor()
	{
		return $this->buildComponent(FormControl::class, [Forms\Blueprint::class, $this->blueprint]);
	}

}
