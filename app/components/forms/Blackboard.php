<?php

namespace App\Components\Forms;

use App\Models\Rme;


class Blackboard extends EditorForm
{

	public function setup()
	{
		$this->addText('title')
			->setRequired('title.missing');
		$this->addText('description')
			->setRequired('description.missing');
		$this->addCheckbox('visible')
			->setDefaultValue(TRUE);

		$this->addSubmit();
	}

	protected function process()
	{
		$v = $this->getValues();

		$blackboard = $this->presenter->blackboard;
		if (!$blackboard)
		{
			$this->presenter->redirect('recorder');
		}

		$blackboard->title = $v->title;
		$blackboard->description = $v->description;
		$blackboard->hidden = !$v->visible;

		$this->orm->flush();

		$this->presenter->flashSuccess('editor.edited.blackboard');

		$block = $this->presenter->block;
		$schema = $this->presenter->schema;
		$this->presenter->redirect('Blackboard:default', [
			'blackboardId' => $blackboard->id,
			'blockId' => $block ? $block->id : NULL,
			'schemaId' => $schema ? $schema->id : NULL,
		]);

		return TRUE;
	}
}