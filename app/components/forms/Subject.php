<?php

namespace App\Components\Forms;

use App\Components\Controls\EditorSelector;
use App\Models\Rme;
use App\Models\Services\Acl;
use App\Models\Services\UserState;
use App\Models\Tasks;
use Nette\Utils\Json;


class Subject extends EditorForm
{

	/**
	 * @var UserState
	 * @inject
	 */
	public $user;

	public function setup()
	{
		$this->addText('title')
			->setRequired('title.missing');
		$this->addText('description')
			->setRequired('description.missing');
		$this->addEditorSelector('editors', $this->orm, $this->user->isAllowed(Acl::ALL));
		$this->addHidden('positions');

		$this->addSubmit();
	}

	protected function process()
	{
		$v = $this->getValues();

		/** @var Rme\Subject $subject */
		$subject = $this->presenter->subject;

		$subject->title = $v->title;
		$subject->description = $v->description;

		/** @var self|EditorSelector[] $this */
		if ($this['editors']->isEditable())
		{
			$subject->editors = $v->editors;
		}

		$schemas = Json::decode($v['positions']);
		foreach ($subject->schemas as $schema)
		{
			$schema->position = NULL;
			$schema->subject = NULL;
		}
		$position = 0;
		foreach ($schemas as $schemaId)
		{
			/** @var Rme\Schema $schema */
			$schema = $this->orm->schemas->getById($schemaId);
			$schema->position = $position;
			$schema->subject = $subject;
			$position++;
		}

		$this->orm->flush();

		$this->presenter->flashSuccess('editor.edited.schema');
		$this->presenter->purgeHeaderTemplateCache();
		$this->presenter->redirect('this');
	}
}
