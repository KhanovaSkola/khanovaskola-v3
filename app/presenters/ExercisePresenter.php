<?php

namespace App\Presenters;

use App\Rme\Blueprint;
use App\Rme\BlueprintCompiler;


final class ExercisePresenter extends BasePresenter
{

	/**
	 * @var int
	 * @persistent
	 */
	public $blueprintId;

	/** @var Blueprint */
	protected $blueprint;

	public function startup()
	{
		parent::startup();

		if (! $this->blueprint = $this->orm->blueprints->getById($this->blueprintId))
		{
			$this->error();
		}
	}

	public function renderDefault()
	{
		$compiler = new BlueprintCompiler();
		//$compiler->setSeed(1114283787);
		$this->template->exercise = $compiler->compile($this->blueprint);
	}

}
