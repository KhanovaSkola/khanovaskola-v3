<?php

namespace App\Presenters;

use Nette\Utils\Json;
use App\Presenters\Parameters;


final class SubjectEditor extends Presenter
{

	use Parameters\Subject;

	public function startup()
	{
		parent::startup();
		$this->loadSubject();
	}

	public function renderDefault()
	{
		if (!$this->user->isAllowed($this->subject))
		{
			$this->flashError('acl.denied.subject');
			$this->redirect('Homepage:default');
		}

		$this->template->subject = $this->subject;
	}

	public function handleSave($payload)
	{
		$data = Json::decode($payload);

		foreach ($data as $schemaId => $values)
		{
			$subject = $this->orm->schemas->getById($schemaId);
			$subject->setValues($values);
		}

		$this->orm->flush();

		$this->purgeHeaderTemplateCache();
		$this->redirect('this');
	}

}
