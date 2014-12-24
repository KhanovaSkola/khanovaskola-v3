<?php

namespace App\Components\Forms;

use App\Models\Orm\RepositoryContainer;
use App\Models\Rme;
use Nette\Application\AbortException;


abstract class EditorForm extends Form
{

	/**
	 * @var RepositoryContainer
	 * @inject
	 */
	public $orm;

	final public function onSuccess()
	{
		try
		{
			$this->process();
		}
		catch (\Exception $e)
		{
			if ($e instanceof AbortException)
			{
				throw $e;
			}
			$this->addError('/editor.form.error', $e->getMessage());
		}
	}

	abstract protected function process();

}
