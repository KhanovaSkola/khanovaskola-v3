<?php

namespace App\Presenters;

use App\Models\Services\Acl;
use Nette\Utils\Json;


final class SubjectsEditor extends Presenter
{

	public function renderDefault()
	{
		if (!$this->user->isAllowed(Acl::ALL))
		{
			$this->flashError('acl.denied.subjects');
			$this->redirect('Homepage:default');
		}

		$this->template->subjects = $this->orm->subjects->findAllButOldWeb();
	}

	public function handleSave($payload)
	{
		$data = Json::decode($payload);

		foreach ($data as $subjectId => $values)
		{
			$subject = $this->orm->subjects->getById($subjectId);
			$subject->setValues($values);
		}

		$this->orm->flush();

		$this->purgeHeaderTemplateCache();
		$this->redirect('this');
	}

}
