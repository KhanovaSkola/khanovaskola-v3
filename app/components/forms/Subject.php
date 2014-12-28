<?php

namespace App\Components\Forms;

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

		if ($this->user->isAllowed(Acl::ALL))
		{
			$this->addMultiSelect('editors', NULL, $this->getEditors())->setTranslator(NULL);
		}
		$this->addHidden('positions');

		$this->addSubmit();
	}

	protected function getEditors()
	{
		return $this->orm->users->findRegistered()->fetchPairs('id', 'email');
	}

	protected function process()
	{
		$v = $this->getValues();

		/** @var Rme\Subject $subject */
		$subject = $this->presenter->subject;

		$subject->title = $v->title;
		$subject->description = $v->description;

		if ($this->user->isAllowed(Acl::ALL))
		{
			$subject->editors = $v->editors;
		}

		$data = Json::decode($v['positions']);
		foreach ($data as $schemaId => $values)
		{
			/** @var Rme\Schema $schema */
			$schema = $this->orm->schemas->getById($schemaId);
			$schema->position = $values->position;
		}

		$this->orm->flush();

		$this->presenter->flashSuccess('editor.edited.schema');
		$this->presenter->purgeHeaderTemplateCache();
		$this->presenter->redirect('this');
	}
}
